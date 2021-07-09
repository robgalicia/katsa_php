DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoadscripcion_ins $$

CREATE PROCEDURE sp_empleadoadscripcion_ins
(IN pidempleado    		int,
IN pfechaadscripcion    datetime,
IN pidregion            smallint,
IN pidadscripcion       smallint,
IN pidcliente           int,
IN pidpuesto            smallint,
IN pidempleadoautoriza  int,
IN pfecharegistro       datetime,
IN pobservaciones		varchar(100),
IN pquien               varchar(15),
 OUT last_id INT)  

begin
	insert into empleadoadscripcion(idempleado,fechaadscripcion,idregion,idadscripcion,idcliente,idpuesto,idempleadoautoriza,fecharegistro,observaciones,quien,cuando)
	values(pidempleado,pfechaadscripcion,pidregion,pidadscripcion,pidcliente,pidpuesto,pidempleadoautoriza,pfecharegistro,pobservaciones,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();	

	update empleado set 
		idregionactual=pidregion,
		idadscripcionactual=pidadscripcion,
		idclienteactual=pidcliente,
		idpuestoorganigrama=pidpuesto
	where idempleado=pidempleado;
	
	commit;
end$$

DELIMITER ;

