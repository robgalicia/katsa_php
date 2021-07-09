DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompraclientedetalle_sel $$

CREATE PROCEDURE sp_ordencompraclientedetalle_sel(IN pidordencompraclientedetalle int)
begin
    select  occd.idordencompraclientedetalle, occd.idordencompracliente, occd.item, 
            ifnull(occd.fechaentrega,'') as fechaentrega, occd.idregion, occd.idadscripcion,
            occd.idservicio, occd.descservicio, ifnull(occd.lugarservicio,'') as lugarservicio,
            ifnull(occd.fechainicial,'') as fechainicial, ifnull(occd.fechafinal,'') as fechafinal,
            occd.cantidad, occd.preciounitario, occd.importetotal
    from ordencompraclientedetalle occd
    where occd.idordencompraclientedetalle=pidordencompraclientedetalle;
end$$

DELIMITER ;