DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciavehi_ups $$

CREATE PROCEDURE sp_tipoincidenciavehi_ups
(IN pidtipoincidenciaveh         int,
IN pdesctipoincidenciaveh         varchar(30),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidtipoincidenciaveh = 0 then	

		insert into tipoincidenciaveh(desctipoincidenciaveh,quien,cuando)
		values(pdesctipoincidenciaveh,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipoincidenciaveh SET
			desctipoincidenciaveh=pdesctipoincidenciaveh,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtipoincidenciaveh = pidtipoincidenciaveh;

		SET last_id = pidtipoincidenciaveh;
	end if;

	commit;
end$$

DELIMITER ;

