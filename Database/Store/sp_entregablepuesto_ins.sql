DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregablepuesto_ins $$

CREATE PROCEDURE sp_entregablepuesto_ins
(IN pidentregable int,
IN pidpuesto      smallint,
IN pquien         varchar(15),
 OUT last_id INT)  

begin
    insert into entregablepuesto(identregable,idpuesto,quien,cuando)
    values(pidentregable,pidpuesto,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();				

	commit;
end$$

DELIMITER ;
