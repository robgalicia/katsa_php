DELIMITER $$

DROP PROCEDURE IF EXISTS sp_puesto_lsttipo $$

CREATE PROCEDURE sp_puesto_lsttipo(IN ptipopuesto char(1))  
-- <T>abulador, <O>rganigrama, <R>egistro
begin
	select idpuesto, descpuesto
	from puesto
	where tipopuesto=ptipopuesto
	order by descpuesto;
end$$

DELIMITER ;

