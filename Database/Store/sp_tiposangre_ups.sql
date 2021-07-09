DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposangre_ups $$

CREATE PROCEDURE sp_tiposangre_ups
(IN pidtiposangre         int,
IN pdesctiposangre         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidtiposangre = 0 then	

		insert into tiposangre(desctiposangre,quien,cuando)
		values(pdesctiposangre,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tiposangre SET
			desctiposangre=pdesctiposangre,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtiposangre = pidtiposangre;

		SET last_id = pidtiposangre;
	end if;

	commit;
end$$

DELIMITER ;