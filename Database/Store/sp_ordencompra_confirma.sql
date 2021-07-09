DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompra_confirma $$

CREATE PROCEDURE sp_ordencompra_confirma
(IN pidordencompra int,
IN pquien varchar(15))
begin
	update ordencompra set
		idestatus=24,	-- Pedido
		quien=pquien,
		cuando=fn_fecha_actual()
	where idordencompra=pidordencompra;
	
	commit;
end$$

DELIMITER ;