DELIMITER $$

DROP PROCEDURE IF EXISTS sp_arrendadora_lst $$

CREATE PROCEDURE sp_arrendadora_lst()
begin
	select 	idarrendadora, nombre
	from arrendadora
	order by nombre;
end$$

DELIMITER ;