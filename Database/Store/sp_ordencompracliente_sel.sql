DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompracliente_sel $$

CREATE PROCEDURE sp_ordencompracliente_sel(IN pidordencompracliente int)
begin
    select  occ.idordencompracliente, occ.folioordencompra, occ.fecha, occ.idcliente, occ.idclientedomiciliofiscal,
            occ.idcotizacion, occ.idtipomoneda, ifnull(occ.observaciones,'') as observaciones, 
            occ.subtotal, occ.porcentajeiva, occ.importeiva, occ.importetotal,
            occd.idordencompraclientedetalle, occd.item, ifnull(occd.fechaentrega,'') as fechaentrega,
            occd.idservicio, occd.descservicio, ifnull(occd.lugarservicio,'') as lugarservicio,
            ifnull(occd.fechainicial,'') as fechainicial, ifnull(occd.fechafinal,'') as fechafinal,
            occd.cantidad, occd.preciounitario, occd.importetotal as detimportetotal
    from ordencompracliente occ
        inner join ordencompraclientedetalle occd on occd.idordencompracliente = occ.idordencompracliente
    where occ.idordencompracliente=pidordencompracliente;
end$$

DELIMITER ;