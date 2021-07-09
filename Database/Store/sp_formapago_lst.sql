DELIMITER $$

DROP PROCEDURE IF EXISTS sp_formapago_lst $$

CREATE PROCEDURE sp_formapago_lst()  
begin
	select idformapago, descformapago
	from formapago
	order by descformapago;
end$$

DELIMITER ;
