DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoparentesco_lst $$

CREATE PROCEDURE sp_tipoparentesco_lst()  
begin
	select idtipoparentesco, desctipoparentesco
	from tipoparentesco
	order by desctipoparentesco;
end$$

DELIMITER ;
