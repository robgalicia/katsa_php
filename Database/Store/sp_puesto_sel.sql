DELIMITER $$

DROP PROCEDURE IF EXISTS sp_puesto_sel $$

CREATE PROCEDURE sp_puesto_sel(IN pidpuesto smallint)  
begin
	select idpuesto, descpuesto, tipopuesto, descfunciones
	from puesto
	where idpuesto=pidpuesto;
end$$

DELIMITER ;
