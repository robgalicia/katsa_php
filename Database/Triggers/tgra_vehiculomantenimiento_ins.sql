DELIMITER $$

DROP TRIGGER IF EXISTS tgra_vehiculomantenimiento_ins $$
 
CREATE TRIGGER tgra_vehiculomantenimiento_ins AFTER INSERT ON vehiculomantenimiento
 FOR EACH ROW 
 
BEGIN

    -- Actualizar datos del vehiculo

	update vehiculo set
		kilometrajemtto = new.kilometrajeactual,
        fechaultimomtto = new.fecha,
		quien = new.quien,
		cuando = fn_fecha_actual()
	where idvehiculo = new.idvehiculo;
				
END$$    
 
DELIMITER ;