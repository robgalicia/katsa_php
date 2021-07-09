DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cuentabancaria_sel $$

CREATE PROCEDURE sp_cuentabancaria_sel(IN pidcuentabancaria smallint)

begin
	select idcuentabancaria, idbanco, ifnull(numerocuenta,'') as numerocuenta, 
			ifnull(clabeinterbancaria,'') as clabeinterbancaria, ifnull(cuentacontable,'') as cuentacontable
   	from cuentabancaria
	where idcuentabancaria=pidcuentabancaria;
end$$

DELIMITER ;
