DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompracliente_ups $$

CREATE PROCEDURE sp_ordencompracliente_ups
(IN pidordencompracliente int,
IN pfolioordencompra     varchar(10),
IN pfecha                datetime,
IN pidcliente            int,
IN pidclientedomiciliofiscal int,
IN pidcotizacion         int,
IN psubtotal             decimal(12,2),
IN pporcentajeiva        decimal(6,2),
IN pimporteiva           decimal(12,2),
IN pimportetotal         decimal(12,2),
IN pidtipomoneda         smallint,
IN pobservaciones        varchar(100),
IN pquien                varchar(15),
 OUT last_id INT)

begin

	if pidordencompracliente = 0 then	

		insert into ordencompracliente(folioordencompra,fecha,idcliente,idclientedomiciliofiscal,idcotizacion,
					idtipomoneda,observaciones,subtotal,porcentajeiva,importeiva,importetotal,quien,cuando)
		values(pfolioordencompra,pfecha,pidcliente,pidclientedomiciliofiscal,pidcotizacion,
					pidtipomoneda,pobservaciones,psubtotal,pporcentajeiva,pimporteiva,pimportetotal,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else

		update ordencompracliente SET
            folioordencompra=pfolioordencompra,
            fecha=pfecha,
            idcliente=pidcliente,
            idclientedomiciliofiscal=pidclientedomiciliofiscal,
            idcotizacion=pidcotizacion,
            idtipomoneda=pidtipomoneda,
			observaciones=pobservaciones,
			subtotal=psubtotal,
			porcentajeiva=pporcentajeiva,
			importeiva=pimporteiva,
			importetotal=pimportetotal,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idordencompracliente = pidordencompracliente;

		SET last_id = pidordencompracliente;
	end if;

	commit;
end$$

DELIMITER ;
