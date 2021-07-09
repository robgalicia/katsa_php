DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompracliente_items $$

CREATE PROCEDURE sp_ordencompracliente_items
(IN panio smallint, 
IN pmes smallint,
IN pfolioordencompra varchar(10))
begin

    select  occ.idordencompracliente, occ.folioordencompra, occ.fecha, c.nombre as nombrecliente,
            ocd.idordencompraclientedetalle, ocd.item, ocd.cantidad, ocd.preciounitario, ocd.importetotal
    from ordencompracliente occ
        inner join cliente c on c.idcliente=occ.idcliente
        inner join ordencompraclientedetalle ocd on ocd.idordencompracliente=occ.idordencompracliente
    where (year(occ.fecha)=panio and month(occ.fecha)=pmes)
    or occ.folioordencompra=pfolioordencompra
    order by occ.fecha, occ.folioordencompra, ocd.item;

end$$

DELIMITER ;