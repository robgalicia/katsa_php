DELIMITER $$

DROP PROCEDURE IF EXISTS sp_partida_del $$

CREATE PROCEDURE sp_partida_del(IN pidpartida smallint)

begin
	delete from partida
	where idpartida=pidpartida;
	
	commit;
end$$

DELIMITER ;
