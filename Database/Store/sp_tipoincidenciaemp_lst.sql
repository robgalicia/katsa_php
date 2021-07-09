DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciaemp_lst $$

CREATE PROCEDURE sp_tipoincidenciaemp_lst()  
begin
	select idtipoincidenciaemp, desctipoincidenciaemp
	from tipoincidenciaemp
	order by desctipoincidenciaemp;
end$$

DELIMITER ;
