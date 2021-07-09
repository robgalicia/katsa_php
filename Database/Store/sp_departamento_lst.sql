DELIMITER $$

DROP PROCEDURE IF EXISTS sp_departamento_lst $$

CREATE PROCEDURE sp_departamento_lst()  
begin
	select iddepartamento, descdepartamento
	from departamento
	order by descdepartamento;
end$$

DELIMITER ;
