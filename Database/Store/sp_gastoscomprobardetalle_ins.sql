DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_ins $$

CREATE PROCEDURE sp_gastoscomprobardetalle_ins
(IN pidgastoscomprobar   int,
IN pidpartida            smallint,
IN pcantidadautoriza     int,
IN pimporteautoriza      decimal(10,2),
IN ptotalautoriza        decimal(10,2),
IN pjustificacion        varchar(100),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

	insert into gastoscomprobardetalle(idgastoscomprobar,idpartida,cantidad,importe,total,
				justificacion,cantidadautoriza,importeautoriza,totalautoriza,quien,cuando)
	values(pidgastoscomprobar,pidpartida,0,0,0,pjustificacion,
			pcantidadautoriza,pimporteautoriza,ptotalautoriza,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();		

	update gastoscomprobar set
		importetotal = (select sum(totalautoriza) from gastoscomprobardetalle where idgastoscomprobar=pidgastoscomprobar)
	where idgastoscomprobar=pidgastoscomprobar;		

	commit;
end$$

DELIMITER ;

