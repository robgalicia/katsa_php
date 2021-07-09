DELIMITER $$

DROP TRIGGER IF EXISTS tgra_vehiculoresguardo_ins $$
 
CREATE TRIGGER tgra_vehiculoresguardo_ins AFTER INSERT ON vehiculoresguardo
 FOR EACH ROW 
 
BEGIN

    -- Actualizar datos del vehiculo

	update vehiculo set
	   idregionactual = new.idregion,
	   idadscripcionactual = new.idadscripcion,
	   idclienteactual = new.idcliente,
	   idempleadoresguardo = new.idempleadoresguardo,
	   kilometrajeactual = new.kilometrajeactual,
	   fechakilometraje = fn_fecha_actual()
	where idvehiculo = new.idvehiculo;
				
END$$    
 
DELIMITER ;

