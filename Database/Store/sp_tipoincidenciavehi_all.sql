DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincisp_tipoincidenciavehi_alldenciaemp_all $$

CREATE PROCEDURE sp_tipoincidenciavehi_all()
begin
	select 	idtipoincidenciaveh, desctipoincidenciaveh
	from tipoincidenciaveh
	order by idtipoincidenciaveh;

end$$

DELIMITER ;
