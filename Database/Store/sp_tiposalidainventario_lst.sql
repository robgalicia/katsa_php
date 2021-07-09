DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposalidainventario_lst $$

CREATE PROCEDURE sp_tiposalidainventario_lst()  
begin
	select idtiposalidainventario, desctiposalidainventario
	from tiposalidainventario
	order by desctiposalidainventario;
end$$

DELIMITER ;
