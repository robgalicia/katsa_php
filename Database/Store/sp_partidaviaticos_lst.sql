DELIMITER $$

DROP PROCEDURE IF EXISTS sp_partidaviaticos_lst $$

CREATE PROCEDURE sp_partidaviaticos_lst()  
begin
	select idpartida, descpartida, ifnull(importeunitario,0) as importeunitario
	from partida
	where viaticos = 'S'
	order by descpartida;
end$$

DELIMITER ;