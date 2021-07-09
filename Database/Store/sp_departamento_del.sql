DELIMITER $$

DROP PROCEDURE IF EXISTS sp_departamento_del $$

CREATE PROCEDURE sp_departamento_del(IN piddepartamento int)

begin
	delete from departamento
	where iddepartamento=piddepartamento;
	
	commit;
end$$

DELIMITER ;
