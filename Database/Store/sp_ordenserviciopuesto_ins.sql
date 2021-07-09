DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenserviciopuesto_ins $$

CREATE PROCEDURE sp_ordenserviciopuesto_ins
(IN pidordenservicio     int,
IN pidpuesto             smallint,
IN pcantidad             smallint
IN pquien            varchar(15),
 OUT last_id INT)

begin
    insert into ordenserviciopuesto(idordenservicio,idpuesto,cantidad,quien,cuando)
    values (pidordenservicio,pidpuesto,pcantidad,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();

	commit;
end$$

DELIMITER ;