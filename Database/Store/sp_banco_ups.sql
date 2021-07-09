DELIMITER $$

DROP PROCEDURE IF EXISTS sp_banco_ups $$

CREATE PROCEDURE sp_banco_ups
(IN pidbanco         int,
IN pdescbanco         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidbanco = 0 then	

		insert into banco(descbanco,quien,cuando)
		values(pdescbanco,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update banco SET
			descbanco=pdescbanco,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idbanco = pidbanco;

		SET last_id = pidbanco;
	end if;

	commit;
end$$

DELIMITER ;

