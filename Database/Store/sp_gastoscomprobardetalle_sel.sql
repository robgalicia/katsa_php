DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_sel $$

CREATE PROCEDURE sp_gastoscomprobardetalle_sel(IN pidgastoscomprobardetalle  int)

begin

    select idpartida,cantidad,importe,total,justificacion,cantidadautoriza,importeautoriza,totalautoriza
    from gastoscomprobardetalle
    where idgastoscomprobardetalle=pidgastoscomprobardetalle;

end$$

DELIMITER ;
