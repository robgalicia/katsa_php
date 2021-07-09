DELIMITER $$

DROP PROCEDURE IF EXISTS sp_trasladovisitante_del $$

CREATE PROCEDURE sp_trasladovisitante_del(IN pidtrasladovisitante int)

begin

    delete from trasladovisitante
    where idtrasladovisitante=pidtrasladovisitante;

	commit;
end$$

DELIMITER ;