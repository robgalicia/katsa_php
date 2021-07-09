DELIMITER $$

DROP TRIGGER IF EXISTS tgra_vehiculotenencia_ins $$
 
CREATE TRIGGER tgra_vehiculotenencia_ins AFTER INSERT ON vehiculotenencia
 FOR EACH ROW 
 
BEGIN

    -- Actualizar datos del vehiculo

	update vehiculo set
		placas = new.placas,
		quien = new.quien,
		cuando = fn_fecha_actual()
	where idvehiculo = new.idvehiculo;
				
END$$    
 
DELIMITER ;

