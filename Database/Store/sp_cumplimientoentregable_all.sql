DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cumplimientoentregable_all $$

CREATE PROCEDURE sp_cumplimientoentregable_all(IN pidagendaentregable int)  

begin

    select idcumplimientoentregable, fechaentrega, cantidadentregada, observaciones
    from cumplimientoentregable
    where idagendaentregable=pidagendaentregable
    order by fechaentrega;

end$$

DELIMITER ;