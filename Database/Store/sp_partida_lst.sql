DELIMITER $$

DROP PROCEDURE IF EXISTS sp_partida_lst $$

CREATE PROCEDURE sp_partida_lst(IN ptipopartida char(1))  
begin
	select idpartida, descpartida
	from partida
	where tipopartida = ptipopartida
	order by descpartida;
end$$

DELIMITER ;
