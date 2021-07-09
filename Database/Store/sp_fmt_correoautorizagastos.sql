DELIMITER $$

DROP PROCEDURE IF EXISTS sp_fmt_correoautorizagastos $$

CREATE PROCEDURE sp_fmt_correoautorizagastos
(IN pidgastoscomprobar INT,
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
	declare vcorreoempleadogastos   varchar(100);

	declare not_found int default 0;
	DECLARE cursor_var CURSOR FOR 
    select 	a.idautorizasolicitud, er.nombrecompleto as empleadorevisa, ea.nombrecompleto as empleadoautoriza
    from autorizasolicitud a
        inner join gastoscomprobar g on g.idregion=a.idregion and g.iddepartamento=a.iddepartamento
        inner join empleado er on er.idempleado=a.idempleadorevisa
        inner join empleado ea on ea.idempleado=a.idempleadoautoriza
    where a.tiposolicitud='G'
    and g.idgastoscomprobar=pidgastoscomprobar;

	declare continue handler for not found set not_found:=1;

	select contenido into vformatolegaltmp
	from formatolegal
	where claveformato='05'
	limit 1;

	select g.folio, fn_fechaletra(g.fecha), e.nombrecompleto, ifnull(g.observaciones,''), ifnull(eg.correoelectronico,'eduardo.mireles@katsamexico.com')
	into vfolio, vfecha, vempleadosolicita, vobservaciones, vcorreoempleadogastos
	from gastoscomprobar g
		inner join empleado e on e.idempleado=g.idempleadosolicita
		left outer join region rg on rg.idregion=g.idregion
		left outer join empleado eg on eg.idempleado=rg.idempleadogastos
	where g.idgastoscomprobar=pidgastoscomprobar;

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
				inner join gastoscomprobar g on g.idregion=a.idregion and g.iddepartamento=a.iddepartamento
				where a.tiposolicitud='G' and g.idgastoscomprobar=pidgastoscomprobar) then

		if paccion='R' then
			-- EMPLEADO REVISA
			select 	e.nombrecompleto as empleado, ifnull(e.correoelectronico,'eduardo.mireles@katsamexico.com') as correo,
					concat('REVISAR SOLICITUD DE GASTOS: ',vfolio) as asunto, textocorreo as formatolegal,
					vcorreoempleadogastos as copiagastos
			from autorizasolicitud a
				inner join empleado e on e.idempleado=a.idempleadorevisa
				inner join gastoscomprobar g on g.idregion=a.idregion and g.iddepartamento=a.iddepartamento
			where a.tiposolicitud='G' and g.idgastoscomprobar=pidgastoscomprobar;
		else
			-- EMPLEADO AUTORIZA
			select 	e.nombrecompleto as empleado, ifnull(e.correoelectronico,'eduardo.mireles@katsamexico.com') as correo,
					concat('AUTORIZAR SOLICITUD DE GASTOS: ',vfolio) as asunto, textocorreo as formatolegal,
					vcorreoempleadogastos as copiagastos
			from autorizasolicitud a
				inner join empleado e on e.idempleado=a.idempleadoautoriza
				inner join gastoscomprobar g on g.idregion=a.idregion and g.iddepartamento=a.iddepartamento
			where a.tiposolicitud='G' and g.idgastoscomprobar=pidgastoscomprobar;
        end if;
	else
		select 	vempleadosolicita as empleado, 'eduardo.mireles@katsamexico.com' as correo,
				concat('PENDIENTE REGISTRAR EMPLEADO AUTORIZACION SOLICITUD DE GASTOS: ',vfolio) as asunto, 
				vformatolegaltmp as formatolegal, vcorreoempleadogastos as copiagastos;
	end if;
end$$
DELIMITER ;
