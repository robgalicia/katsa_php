DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cuentabancaria_lst $$

CREATE PROCEDURE sp_cuentabancaria_lst(IN pidbanco smallint)  
begin
	select idcuentabancaria, numerocuenta
	from cuentabancaria
	where idbanco = pidbanco
	order by numerocuenta;
end$$

DELIMITER ;
