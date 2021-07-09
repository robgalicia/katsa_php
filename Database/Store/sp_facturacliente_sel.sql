DELIMITER $$

DROP PROCEDURE IF EXISTS sp_facturacliente_sel $$

CREATE PROCEDURE sp_facturacliente_sel(IN pidfacturacliente int)

begin

    select  idordencompraclientedetalle, fechaemision, fechavencimiento, importetotal,
            fechapago,referenciapago
    from facturacliente
    where e.idfacturacliente=pidfacturacliente;

end$$

DELIMITER ;      