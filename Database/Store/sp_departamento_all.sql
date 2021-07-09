DELIMITER $$

DROP PROCEDURE IF EXISTS sp_departamento_all $$

CREATE PROCEDURE sp_departamento_all()
begin
	select 	iddepartamento, descdepartamento
	from departamento
	order by descdepartamento;

end$$

DELIMITER ;