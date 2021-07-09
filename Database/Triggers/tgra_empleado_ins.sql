DELIMITER $$

DROP TRIGGER IF EXISTS tgra_empleado_ins $$
 
CREATE TRIGGER tgra_empleado_ins AFTER INSERT ON empleado
 FOR EACH ROW 
 
BEGIN

    -- Insertar registro en tabla de adscripción
	
	insert into empleadoadscripcion(idempleado,fechaadscripcion,idregion,idadscripcion,idcliente,idpuesto,idempleadoautoriza,
				fecharegistro,observaciones,quien,cuando)
	values(new.idempleado, new.fechaingreso, new.idregionactual, new.idadscripcionactual, new.idclienteactual, new.idpuestoorganigrama,
			null, fn_fecha_actual(), 'NUEVO INGRESO', new.quien, fn_fecha_actual());
				
END$$    
 
DELIMITER ;

