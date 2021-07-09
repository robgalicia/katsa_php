DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cuentabancaria_all $$

CREATE PROCEDURE sp_cuentabancaria_all()

begin
	select cb.idcuentabancaria, b.descbanco, ifnull(cb.numerocuenta,'') as numerocuenta, 
			ifnull(cb.clabeinterbancaria,'') as clabeinterbancaria, ifnull(cb.cuentacontable,'') as cuentacontable
   	from cuentabancaria cb
		inner join banco b on b.idbanco=cb.idbanco
	order by cb.idbanco;
end$$

DELIMITER ;
