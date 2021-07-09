DELIMITER $$

DROP PROCEDURE IF EXISTS sp_facturacliente_ins $$

CREATE PROCEDURE sp_facturacliente_ins
(IN pidordencompraclientedetalle int,
IN pcantidad            int,
IN pfechaemision        datetime,
IN pimportetotal        decimal(12,2),
IN pquien               varchar(15))

begin
    declare vnumfactura int default 1;

    while vnumfactura <= pcantidad do
        insert into facturacliente(idordencompraclientedetalle,fechaemision,fechavencimiento,importetotal,quien,cuando)
        values(pidordencompraclientedetalle,pfechaemision,pfechaemision,pimportetotal,pquien,fn_fecha_actual());

        set vnumfactura = numfactura + 1;
        SET pfechaemision = DATE_ADD(pfechaemision,INTERVAL 1 month);
    end while;


	commit;
end$$

DELIMITER ;
