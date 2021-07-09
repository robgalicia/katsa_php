DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencomprafactura_updaplicarpago $$

CREATE PROCEDURE sp_ordencomprafactura_updaplicarpago
(IN pidordencomprafactura	int,
IN pfechapagado          datetime,
IN pidformapagado        smallint,
IN preferenciapagado     varchar(20),
IN pobservacionespagado  varchar(100),
IN pquien varchar(15))  

begin

	update ordencomprafactura set 
		fechapagado=pfechapagado,
		idformapagado=pidformapagado,
		referenciapagado=preferenciapagado,
		observacionespagado=pobservacionespagado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idordencomprafactura = pidordencomprafactura;
	
	commit;
end$$

DELIMITER ;

   