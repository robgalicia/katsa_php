DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_all $$

CREATE PROCEDURE sp_gastoscomprobardetalle_all(IN pidgastoscomprobar int)

begin

    select  idgastoscomprobardetalle,idpartida,cantidad,importe,total,justificacion,
            cantidadautoriza,importeautoriza,totalautoriza
    from gastoscomprobardetalle
    where idgastoscomprobar=pidgastoscomprobar
    order by idgastoscomprobardetalle;

end$$

DELIMITER ;