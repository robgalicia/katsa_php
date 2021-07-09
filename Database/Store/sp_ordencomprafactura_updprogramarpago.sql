DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencomprafactura_updprogramarpago $$

CREATE PROCEDURE sp_ordencomprafactura_updprogramarpago
(IN pidordencomprafactura	int,
IN pfechapagoprogramado datetime,
IN pquien varchar(15))  

begin

	update ordencomprafactura set 
		fechapagoprogramado=pfechapagoprogramado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idordencomprafactura = pidordencomprafactura;
	
	commit;
end$$

DELIMITER ;