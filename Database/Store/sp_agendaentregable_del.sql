DELIMITER $$

DROP PROCEDURE IF EXISTS sp_agendaentregable_del $$

CREATE PROCEDURE sp_agendaentregable_del(IN pidagendaentregable int)  

begin

    delete from agendaentregable
    where idagendaentregable=pidagendaentregable;

    commit;

end$$

DELIMITER ;
