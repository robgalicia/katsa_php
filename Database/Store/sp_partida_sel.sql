DELIMITER $$

DROP PROCEDURE IF EXISTS sp_partida_sel $$

CREATE PROCEDURE sp_partida_sel(IN pidpartida smallint)

begin
	select 	idpartida, descpartida, ifnull(cuentacontable,'') as cuentacontable, 
			tipopartida, ifnull(viaticos,'N') as viaticos, ifnull(importeunitario,0) as importeunitario
   	from partida
	where idpartida=pidpartida;
end$$

DELIMITER ;
