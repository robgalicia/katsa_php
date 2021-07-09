DELIMITER $$

DROP TRIGGER IF EXISTS tgra_vehiculogasolina_ins $$
 
CREATE TRIGGER tgra_vehiculogasolina_ins AFTER INSERT ON vehiculogasolina
 FOR EACH ROW 
 
BEGIN
	declare vnumtarjeta int;
	
	select ifnull(numtarjeta,0) into vnumtarjeta
	from tarjetacombustible
	where idtarjetacombustible=new.idtarjetacombustible;
	
    -- Actualizar datos del vehiculo

	update vehiculo set tarjetacombustible = vnumtarjeta
	where idvehiculo = new.idvehiculo;
				
END$$    
 
DELIMITER ;

