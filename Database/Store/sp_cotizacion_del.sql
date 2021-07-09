DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizacion_del $$

CREATE PROCEDURE sp_cotizacion_del(IN pidcotizacion int) 
begin

	delete from cotizacion
	where idcotizacion=pidcotizacion;

    commit;
end$$

DELIMITER ;