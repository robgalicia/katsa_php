DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciaveh_lst $$

CREATE PROCEDURE sp_tipoincidenciaveh_lst()  
begin
	select idtipoincidenciaveh, desctipoincidenciaveh
	from tipoincidenciaveh
	order by desctipoincidenciaveh;
end$$

DELIMITER ;
