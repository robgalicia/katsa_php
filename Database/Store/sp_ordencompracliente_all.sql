DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompracliente_all $$

CREATE PROCEDURE sp_ordencompracliente_all(IN panio smallint, IN pmes smallint)
begin
    select  occ.idordencompracliente, occ.folioordencompra, occ.fecha, 
            occ.idcliente, c.nombre as nombrecliente,
            occ.idcotizacion, cot.folio as foliocotizacion
    from ordencompracliente occ
        inner join cliente c on c.idcliente=occ.idcliente
        inner join cotizacion cot on cot.idcotizacion=occ.idcotizacion
    where year(occ.fecha)=panio and month(occ.fecha)=pmes
    order by occ.fecha;
end$$

DELIMITER ;