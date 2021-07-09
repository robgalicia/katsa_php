DELIMITER $$

DROP PROCEDURE IF EXISTS sp_aseguradora_lst $$

CREATE PROCEDURE sp_aseguradora_lst()  
begin
	select idaseguradora, descaseguradora
	from aseguradora
	order by descaseguradora;
end$$

DELIMITER ;
