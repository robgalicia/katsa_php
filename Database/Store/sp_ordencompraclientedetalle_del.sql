DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompraclientedetalle_del $$

CREATE PROCEDURE sp_ordencompraclientedetalle_del(IN pidordencompraclientedetalle int)
begin
    declare vidordencompracliente int;

    select idordencompracliente into vidordencompracliente
    from ordencompraclientedetalle
    where idordencompraclientedetalle=pidordencompraclientedetalle;

    delete from ordencompraclientedetalle
    where idordencompraclientedetalle=pidordencompraclientedetalle;

    update ordencompracliente set subtotal=(select sum(importetotal) from ordencompraclientedetalle where idordencompracliente=vidordencompracliente)
	where idordencompracliente=vidordencompracliente;

    update ordencompracliente set
        importeiva = (subtotal * (ifnull(porcentajeiva,16)/100)),
        importetotal = subtotal + importeiva
    where idordencompracliente=vidordencompracliente;

    commit;
end$$

DELIMITER ;