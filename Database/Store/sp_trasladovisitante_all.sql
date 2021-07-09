DELIMITER $$

DROP PROCEDURE IF EXISTS sp_trasladovisitante_all $$

CREATE PROCEDURE sp_trasladovisitante_all(IN pidhojatraslado int)

begin

    select idtrasladovisitante,nombrevisitante,empresa
    from trasladovisitante
    where idhojatraslado=pidhojatraslado
    order by idtrasladovisitante;

end$$

DELIMITER ;