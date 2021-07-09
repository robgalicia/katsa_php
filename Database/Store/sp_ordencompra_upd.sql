DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompra_upd $$

CREATE PROCEDURE sp_ordencompra_upd
(IN pidordencompra	int,
IN pobservaciones	varchar(100),
IN pquien           varchar(15))  

begin

	update ordencompra set
		observaciones=pobservaciones,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idordencompra = pidordencompra;
	
	commit;
end$$

DELIMITER ;