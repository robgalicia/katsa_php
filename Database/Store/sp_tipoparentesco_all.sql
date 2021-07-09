DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoparentesco_all $$

CREATE PROCEDURE sp_tipoparentesco_all()
begin
	select 	idtipoparentesco, desctipoparentesco
	from tipoparentesco
	order by desctipoparentesco;

end$$

DELIMITER ;
