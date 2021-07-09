DELIMITER $$

DROP PROCEDURE IF EXISTS sp_login $$

CREATE PROCEDURE sp_login(IN plogin varchar(15), IN ppassword varchar(20))
/***
call sp_login('emireles','mice');
***/
begin

	declare vidusuario smallint;
	declare vpassword varchar(20);
	declare vnombre varchar(30);
	declare vfechabaja datetime;
	declare vidempleado smallint;	
	declare vmensaje varchar(100);
	declare vquien varchar(15);	
	declare vdatabase varchar(30);
	declare vidsesion int;
	declare viddepartamento smallint;
	declare vidregion smallint;
	declare vidadscripcion smallint;
	
	set vmensaje='Ok';
	select database() into vdatabase;
	if vdatabase='u755360753_jurid' then
		set vdatabase='Database: Jurídico';
	end if;

	if exists(select 1 from usuario where login=plogin) then
		select 	u.idusuario, ifnull(u.idempleado,0), u.password, u.nombre, u.fechabaja, login, 
				ifnull(e.iddepartamento,0) as iddepartamento, 
                ifnull(e.idregionactual,0) as idregion,
                ifnull(e.idadscripcionactual,0) as idadscripcion
		into 	vidusuario, vidempleado, vpassword, vnombre, vfechabaja, vquien, viddepartamento, 
				vidregion, vidadscripcion
		from usuario u
			left outer join empleado e on e.idempleado=u.idempleado
		where login=plogin;

		if vpassword <> ppassword then
			set vidusuario=0;
			set vmensaje='Contraseña inválida!';
		end if;

		if vfechabaja is not null then
			set vidusuario=0;
			set vmensaje='Usuario dado de baja';
		end if;
		
		-- registrar sesión del usuario en la bitácora
		insert into bitsesion (login, nombre, fechalogin)
		values(vquien, vnombre, fn_fecha_actual());

		set vidsesion = LAST_INSERT_ID();
		commit;

		select 	vidusuario idusuario, vnombre nombre, vidempleado idempleado ,vmensaje mensaje, vquien quien, 
				vdatabase as nombre_database, vidsesion as idsesion, viddepartamento as iddepartamento, 
				vidregion as idregion, vidadscripcion as idadscripcion;
	else
		select 	0 idusuario, null nombre, 'El usuario no existe.' mensaje,
				null quien, vdatabase as nombre_database, 0 as idsesion, 0 as iddepartamento, 
				0 as idregion, 0 as idadscripcion;
	end if;

end$$

DELIMITER ;
