DELIMITER $$

DROP PROCEDURE IF EXISTS sp_almacen_del $$

CREATE PROCEDURE sp_almacen_del(IN pidalmacen int)

begin
	delete from almacen
	where idalmacen=pidalmacen;
	
	commit;
end$$

DELIMITER ;
