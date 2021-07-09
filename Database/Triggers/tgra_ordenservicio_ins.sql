DELIMITER $$

DROP TRIGGER IF EXISTS tgra_ordenservicio_ins $$
 
CREATE TRIGGER tgra_ordenservicio_ins AFTER INSERT ON ordenservicio
 FOR EACH ROW 
 
BEGIN

    -- Registrar acta de servicio inicial

    insert into actaservicio(idordenservicio,numeroacta,fechaacta,tipoacta,observaciones,quien, cuando)
    values (new.idordenservicio,new.numeroacta,new.fechainicio,'I',new.observaciones,new.quien,fn_fecha_actual());

END$$    
 
DELIMITER ;