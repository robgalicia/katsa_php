DELIMITER $$

DROP PROCEDURE IF EXISTS sp_marcavehiculo_ups $$

CREATE PROCEDURE sp_marcavehiculo_ups
(IN pidmarcavehiculo         int,
IN pdescmarcavehiculo         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidmarcavehiculo = 0 then	

		insert into marcavehiculo(descmarcavehiculo,quien,cuando)
		values(pdescmarcavehiculo,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update marcavehiculo SET
			descmarcavehiculo=pdescmarcavehiculo,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idmarcavehiculo = pidmarcavehiculo;

		SET last_id = pidmarcavehiculo;
	end if;

	commit;
end$$

DELIMITER ;