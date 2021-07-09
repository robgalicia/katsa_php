DELIMITER $$

DROP PROCEDURE IF EXISTS sp_partida_all $$

CREATE PROCEDURE sp_partida_all(IN ptipopartida char(1))

begin
	select 	idpartida, descpartida, cuentacontable,
			case tipopartida when 'G' then 'GASTOS' when 'C' then 'COSTOS' else 'INVERSIONES' end as tipopartida,
			case viaticos when 'S' then 'SI' else 'NO' end as viaticos,
			ifnull(importeunitario,0) as importeunitario
   	from partida
	where tipopartida=ptipopartida
	order by descpartida desc;
end$$

DELIMITER ;
