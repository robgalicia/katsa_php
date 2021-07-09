DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_upd $$

CREATE PROCEDURE sp_gastoscomprobardetalle_upd
(IN pidgastoscomprobardetalle   int,
IN pcantidadautoriza            int,
IN pimporteautoriza             decimal(10,2),
IN ptotalautoriza               decimal(10,2),
IN pquien           			varchar(15))  
begin

	declare pidgastoscomprobar int;

	select idgastoscomprobar into pidgastoscomprobar
	from gastoscomprobardetalle
	where idgastoscomprobardetalle = pidgastoscomprobardetalle; 

	update gastoscomprobardetalle set
		cantidadautoriza=pcantidadautoriza,
		importeautoriza=pimporteautoriza,
		totalautoriza=ptotalautoriza,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobardetalle = pidgastoscomprobardetalle;
						
	update gastoscomprobar set
		importetotal = (select sum(totalautoriza) from gastoscomprobardetalle where idgastoscomprobar=pidgastoscomprobar)
	where idgastoscomprobar=pidgastoscomprobar;	

	commit;
end$$

DELIMITER ;