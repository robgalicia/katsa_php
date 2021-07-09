DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nivelgasolina_ups $$

CREATE PROCEDURE sp_nivelgasolina_ups
(IN pidnivelgasolina         int,
IN pdescnivelgasolina         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidnivelgasolina = 0 then	

		insert into nivelgasolina(descnivelgasolina,quien,cuando)
		values(pdescnivelgasolina,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update nivelgasolina SET
			descnivelgasolina=pdescnivelgasolina,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idnivelgasolina = pidnivelgasolina;

		SET last_id = pidnivelgasolina;
	end if;

	commit;
end$$

DELIMITER ;

