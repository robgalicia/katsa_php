DELIMITER $$

DROP PROCEDURE IF EXISTS sp_traslado_del $$

CREATE PROCEDURE sp_traslado_del(IN pidtraslado int)
begin
	delete from traslado
	where idtraslado=pidtraslado;

    commit;
end$$

DELIMITER ;
