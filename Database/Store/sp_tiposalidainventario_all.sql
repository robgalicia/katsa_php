DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposalidainventario_all $$

CREATE PROCEDURE sp_tiposalidainventario_all()
begin
	select 	idtiposalidainventario, desctiposalidainventario
	from tiposalidainventario
	order by desctiposalidainventario;

end$$

DELIMITER ;
