DELIMITER $$

DROP PROCEDURE IF EXISTS sp_agendaentregable_sel $$

CREATE PROCEDURE sp_agendaentregable_sel(IN pidagendaentregable int)  

begin

    select identregable, idpuesto, fechacompromiso, cantidadentregable
    from agendaentregable
    where idagendaentregable=pidagendaentregable;

end$$

DELIMITER ;
