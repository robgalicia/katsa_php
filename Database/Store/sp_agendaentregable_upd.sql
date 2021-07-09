DELIMITER $$

DROP PROCEDURE IF EXISTS sp_agendaentregable_upd $$

CREATE PROCEDURE sp_agendaentregable_upd
(IN pidagendaentregable int,
IN pcantidadentregable  smallint,
IN pfechacompromiso datetime,
IN pquien           varchar(15))  

begin

    update agendaentregable SET
        cantidadentregable=pcantidadentregable,
        fechacompromiso=pfechacompromiso,
        quien=pquien,
        cuando=fn_fecha_actual()
    where idagendaentregable = pidagendaentregable;

	commit;
end$$

DELIMITER ;
