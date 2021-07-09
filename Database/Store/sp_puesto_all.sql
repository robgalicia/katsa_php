DELIMITER $$

DROP PROCEDURE IF EXISTS sp_puesto_all $$

CREATE PROCEDURE sp_puesto_all(IN piddepartamento smallint)
begin
	select 	idpuesto, descpuesto, 
			case tipopuesto when 'T' then 'TABULADOR' when 'O' then 'ORGANIGRAMA' else 'REGISTRO SSP' end as tipopuesto,
			descfunciones
	from puesto
	where iddepartamento=piddepartamento
	order by descpuesto;

end$$

DELIMITER ;