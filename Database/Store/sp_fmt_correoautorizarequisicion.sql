DELIMITER $$

DROP PROCEDURE IF EXISTS sp_fmt_correoautorizarequisicion $$

CREATE PROCEDURE sp_fmt_correoautorizarequisicion
(IN pidrequisicion INT,
IN paccion char(1)) -- Revisar, Autorizar
begin
	declare vformatolegal			text;
	declare vformatolegaltmp		text;
	declare vempleadorevisa	    	varchar(100);
	declare vempleadoautoriza	    varchar(100);
	declare vfolio                  varchar(12);
    declare vfecha					varchar(50);
	declare vempleadosolicita       varchar(100);
	declare vobservaciones 	        varchar(1500);
    declare vidautorizasolicitud	smallint;
	declare vcorreoempleadocompras  varchar(100);

	declare not_found int default 0;
	DECLARE cursor_var CURSOR FOR 
    select 	a.idautorizasolicitud, er.nombrecompleto as empleadorevisa, ea.nombrecompleto as empleadoautoriza
    from autorizasolicitud a
        inner join requisicion r on r.idregion=a.idregion and r.iddepartamento=a.iddepartamento
        inner join empleado er on er.idempleado=a.idempleadorevisa
        inner join empleado ea on ea.idempleado=a.idempleadoautoriza
    where a.tiposolicitud='R'
    and r.idrequisicion=pidrequisicion;

	declare continue handler for not found set not_found:=1;

	select contenido into vformatolegaltmp
	from formatolegal
	where claveformato='04'
	limit 1;

	select r.folio, fn_fechaletra(r.fecha), e.nombrecompleto, ifnull(r.observaciones,''), ifnull(ec.correoelectronico,'eduardo.mireles@katsamexico.com')
	into vfolio, vfecha, vempleadosolicita, vobservaciones, vcorreoempleadocompras
	from requisicion r
		inner join empleado e on e.idempleado=r.idempleadosolicita
		left outer join region rg on rg.idregion=r.idregion
		left outer join empleado ec on ec.idempleado=rg.idempleadocompras
	where r.idrequisicion=pidrequisicion;

	OPEN cursor_var;
	cursor_var_loop: LOOP
		FETCH cursor_var INTO vidautorizasolicitud, vempleadorevisa, vempleadoautoriza;
		if not_found=1 then
			close cursor_var;
			leave cursor_var_loop;
		end if;

		set vformatolegal = vformatolegaltmp;

		if paccion='R' then
			set vformatolegal = replace(vformatolegal, '{EMPLEADO_AUTORIZA}', vempleadorevisa);
		else
			set vformatolegal = replace(vformatolegal, '{EMPLEADO_AUTORIZA}', vempleadoautoriza);
        end if;

		set vformatolegal = replace(vformatolegal, '{FOLIO}', vfolio);
		set vformatolegal = replace(vformatolegal, '{FECHA_SOLICITUD}', vfecha);
		set vformatolegal = replace(vformatolegal, '{EMPLEADO_SOLICITA}', vempleadosolicita);
		set vformatolegal = replace(vformatolegal, '{OBSERVACIONES}', vobservaciones);

		update autorizasolicitud set textocorreo=vformatolegal
        where idautorizasolicitud=vidautorizasolicitud;

	END LOOP cursor_var_loop;
	commit;

	if exists(select 1 from autorizasolicitud a
				inner join requisicion r on r.idregion=a.idregion and r.iddepartamento=a.iddepartamento
				where a.tiposolicitud='R' and r.idrequisicion=pidrequisicion) then

		if paccion='R' then
			-- EMPLEADO REVISA
			select 	e.nombrecompleto as empleado, ifnull(e.correoelectronico,'eduardo.mireles@katsamexico.com') as correo,
					concat('REVISAR FOLIO REQUISICION: ',vfolio) as asunto, textocorreo as formatolegal,
					vcorreoempleadocompras as copiacompras
			from autorizasolicitud a
				inner join empleado e on e.idempleado=a.idempleadorevisa
				inner join requisicion r on r.idregion=a.idregion and r.iddepartamento=a.iddepartamento
			where a.tiposolicitud='R' and r.idrequisicion=pidrequisicion;
		else
			-- EMPLEADO AUTORIZA
			select 	e.nombrecompleto as empleado, ifnull(e.correoelectronico,'eduardo.mireles@katsamexico.com') as correo,
					concat('AUTORIZAR FOLIO REQUISICION: ',vfolio) as asunto, textocorreo as formatolegal,
					vcorreoempleadocompras as copiacompras
			from autorizasolicitud a
				inner join empleado e on e.idempleado=a.idempleadoautoriza
				inner join requisicion r on r.idregion=a.idregion and r.iddepartamento=a.iddepartamento
			where a.tiposolicitud='R' and r.idrequisicion=pidrequisicion;
        end if;
	else
		select 	vempleadosolicita as empleado, 'eduardo.mireles@katsamexico.com' as correo,
				concat('PENDIENTE REGISTRAR EMPLEADO AUTORIZACION - FOLIO REQUISICION: ',vfolio) as asunto, 
				vformatolegaltmp as formatolegal, vcorreoempleadocompras as copiacompras;
	end if;
end$$
DELIMITER ;