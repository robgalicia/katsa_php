DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cuentabancaria_ups $$

CREATE PROCEDURE sp_cuentabancaria_ups
(IN pidcuentabancaria     smallint,
IN pidbanco              smallint,
IN pnumerocuenta         varchar(20),
IN pclabeinterbancaria   varchar(20),
IN pcuentacontable       varchar(20),
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidcuentabancaria = 0 then	

		insert into cuentabancaria(idbanco,numerocuenta,clabeinterbancaria,cuentacontable,quien,cuando)
		values(pidbanco,pnumerocuenta,pclabeinterbancaria,pcuentacontable,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update cuentabancaria SET
			idbanco=pidbanco,
			numerocuenta=pnumerocuenta,
			clabeinterbancaria=pclabeinterbancaria,
			cuentacontable=pcuentacontable,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idcuentabancaria = pidcuentabancaria;

		SET last_id = pidcuentabancaria;
	end if;

	commit;
end$$

DELIMITER ;

