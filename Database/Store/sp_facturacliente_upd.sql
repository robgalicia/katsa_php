DELIMITER $$

DROP PROCEDURE IF EXISTS sp_facturacliente_upd $$

CREATE PROCEDURE sp_facturacliente_upd
(IN pidfacturacliente     int,
IN pidordencompraclientedetalle int,
IN pfechaemision         datetime,
IN pfechavencimiento     datetime,
IN pimportetotal         decimal(12,2),
IN pquien                varchar(15))

begin

    update facturacliente SET
        idordencompraclientedetalle=pidordencompraclientedetalle,
        fechaemision=pfechaemision,
        fechavencimiento=pfechavencimiento,
        importetotal=pimportetotal,   
        quien=pquien,
        cuando=fn_fecha_actual()
    where idfacturacliente = pidfacturacliente;

	commit;
end$$

DELIMITER ;