DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cumplimientoentregable_del $$

CREATE PROCEDURE sp_cumplimientoentregable_del(IN pidcumplimientoentregable int)

begin

    delete from cumplimientoentregable
    where idcumplimientoentregable=pidcumplimientoentregable;

	commit;
    
end$$

DELIMITER ;