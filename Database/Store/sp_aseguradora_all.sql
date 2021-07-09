DELIMITER $$

DROP PROCEDURE IF EXISTS sp_aseguradora_all $$

CREATE PROCEDURE sp_aseguradora_all()  
begin
	select 	idaseguradora,descaseguradora
	from aseguradora 
	order by idaseguradora;

end$$

DELIMITER ;
