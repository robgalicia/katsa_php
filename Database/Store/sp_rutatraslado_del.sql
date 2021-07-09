DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rutatraslado_del $$

CREATE PROCEDURE sp_rutatraslado_del(IN pidrutatraslado smallint)
begin
	delete from rutatraslado
	where idrutatraslado=pidrutatraslado;

    commit;
end$$

DELIMITER ;