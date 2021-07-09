DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompraclientedetalle_ups $$

CREATE PROCEDURE sp_ordencompraclientedetalle_ups
(IN pidordencompraclientedetalle int,
IN pidordencompracliente int,
IN pitem                 smallint,
IN pfechaentrega         datetime,
IN pidservicio           int,
IN pdescservicio         varchar(1000),
IN pidregion			 smallint,
IN pidadscripcion		 smallint,
IN plugarservicio        varchar(100),
IN pfechainicial         datetime,
IN pfechafinal           datetime,
IN pcantidad             int,
IN ppreciounitario       decimal(12,2),
IN pimportetotal         decimal(12,2),
IN pquien                varchar(15),
 OUT last_id INT)

begin

	if pidordencompraclientedetalle = 0 then	

		insert into ordencompraclientedetalle(idordencompracliente,item,fechaentrega,idservicio,descservicio,
					idregion,idadscripcion,lugarservicio,fechainicial,fechafinal,cantidad,preciounitario,importetotal,quien,cuando)
		values(pidordencompracliente,pitem,pfechaentrega,pidservicio,pdescservicio,pidregion,pidadscripcion,plugarservicio,
					pfechainicial,pfechafinal,pcantidad,ppreciounitario,pimportetotal,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else

		update ordencompraclientedetalle SET
            idordencompracliente=pidordencompracliente,
            item=pitem,
			fechaentrega=pfechaentrega,
            idservicio=pidservicio,
            descservicio=pdescservicio,
			idregion=pidregion,
			idadscripcion=pidadscripcion,
			lugarservicio=plugarservicio,
			fechainicial=pfechainicial,
			fechafinal=pfechafinal,
            cantidad=pcantidad,
            preciounitario=ppreciounitario,
			importetotal=pimportetotal,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idordencompraclientedetalle = pidordencompraclientedetalle;

		SET last_id = pidordencompraclientedetalle;
	end if;

    update ordencompracliente set subtotal=(select sum(importetotal) from ordencompraclientedetalle where idordencompracliente=vidordencompracliente)
	where idordencompracliente=pidordencompracliente;

    update ordencompracliente set
        importeiva = (subtotal * (ifnull(porcentajeiva,16)/100)),
        importetotal = subtotal + importeiva
    where idordencompracliente=pidordencompracliente;

	commit;
end$$

DELIMITER ;
