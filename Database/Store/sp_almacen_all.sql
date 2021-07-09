DELIMITER $$

DROP PROCEDURE IF EXISTS sp_almacen_all $$

CREATE PROCEDURE sp_almacen_all()
begin
	select 	idalmacen,idregion,descalmacen
        from almacen
        order by idalmacen;

end$$

DELIMITER ;
