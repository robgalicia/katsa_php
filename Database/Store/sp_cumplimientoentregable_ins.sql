DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cumplimientoentregable_ins $$

CREATE PROCEDURE sp_cumplimientoentregable_ins
(IN pidagendaentregable int,
IN pfechaentrega        datetime,
IN pcantidadentregada   smallint,
IN pidempleadoentrega   int,
IN pobservaciones       varchar(100),
IN pquien            varchar(15),
 OUT last_id INT)

begin

    insert into cumplimientoentregable(idagendaentregable,fechaentrega,cantidadentregada,
                idempleadoentrega,observaciones,quien,cuando)
    values(pidagendaentregable,pfechaentrega,pcantidadentregada,pidempleadoentrega,
                pobservaciones,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();
	commit;
end$$

DELIMITER ;