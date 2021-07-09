DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciaemp_all $$

CREATE PROCEDURE sp_tipoincidenciaemp_all()
begin
	select 	idtipoincidenciaemp, desctipoincidenciaemp
	from tipoincidenciaemp
	order by idtipoincidenciaemp;

end$$

DELIMITER ;
