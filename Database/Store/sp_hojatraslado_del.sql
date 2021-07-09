DELIMITER $$

DROP PROCEDURE IF EXISTS sp_hojatraslado_del $$

CREATE PROCEDURE sp_hojatraslado_del(IN pidhojatraslado int)

begin
	delete from hojatraslado
	where idhojatraslado=pidhojatraslado;
	
	commit;
end$$

DELIMITER ;