DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_ups $$

CREATE PROCEDURE sp_gastoscomprobardetalle_ups
(IN pidgastoscomprobardetalle  int,
IN pidgastoscomprobar    int,
IN pidpartida            smallint,
IN pcantidad             int,
IN pimporte              decimal(10,2),
IN ptotal                decimal(10,2),
IN pjustificacion        varchar(100),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

    if pidgastoscomprobardetalle = 0 then

        insert into gastoscomprobardetalle(idgastoscomprobar,idpartida,cantidad,importe,total,
                    justificacion,cantidadautoriza,importeautoriza,totalautoriza,quien,cuando)
        values(pidgastoscomprobar,pidpartida,pcantidad,pimporte,ptotal,pjustificacion,
                pcantidad,pimporte,ptotal,pquien,fn_fecha_actual());

        SET last_id = LAST_INSERT_ID();				
    else
        update gastoscomprobardetalle set
            idpartida=pidpartida,
            cantidad=pcantidad,
            importe=pimporte,
            total=ptotal,
            justificacion=pjustificacion,
            quien=pquien,
            cuando=fn_fecha_actual()
        where idgastoscomprobardetalle=pidgastoscomprobardetalle;
    end if;
	
	update gastoscomprobar set
		importetotal = (select sum(total) from gastoscomprobardetalle where idgastoscomprobar=pidgastoscomprobar)
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;
