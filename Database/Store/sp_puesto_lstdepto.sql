DELIMITER $$

DROP PROCEDURE IF EXISTS sp_puesto_lstdepto $$

CREATE PROCEDURE sp_puesto_lstdepto(IN piddepartamento smallint)  

begin
	select idpuesto, descpuesto
	from puesto
	where tipopuesto='O'    -- <T>abulador, <O>rganigrama, <R>egistro
    and iddepartamento=piddepartamento
	order by descpuesto;
end$$

DELIMITER ;
