DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoadscripcion_del $$

CREATE PROCEDURE sp_empleadoadscripcion_del(IN pidempleadoadscripcion int)  

begin
	declare vcuantos 		smallint;
	declare vidregion		smallint;
	declare vidadscripcion 	smallint;
	declare vidcliente		int;
	declare vidpuesto		smallint;	
	declare vidempleado		int;

	select count(*) into vcuantos
	from empleadoadscripcion
	where idempleado = (select idempleado from empleadoadscripcion where idempleadoadscripcion=pidempleadoadscripcion);
	
	if vcuantos > 1 then
		select idregion, idadscripcion, idcliente, idpuesto, idempleado
		into vidregion, vidadscripcion, vidcliente, vidpuesto, vidempleado
		from empleadoadscripcion
		where idempleadoadscripcion=(select max(idempleadoadscripcion) from empleadoadscripcion where idempleadoadscripcion < pidempleadoadscripcion);
	
		delete from empleadoadscripcion
		where idempleadoadscripcion=pidempleadoadscripcion;
	
		update empleado set 
			idregionactual=vidregion,
			idadscripcionactual=vpidadscripcion,
			idclienteactual=vidcliente,
			idpuestoorganigrama=vidpuesto
		where idempleado = vidempleado;
	
		commit;
	end if;
end$$

DELIMITER ;

