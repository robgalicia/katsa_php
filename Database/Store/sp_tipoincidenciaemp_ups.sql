DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciaemp_ups $$

CREATE PROCEDURE sp_tipoincidenciaemp_ups
(IN pidtipoincidenciaemp         int,
IN pdesctipoincidenciaemp         varchar(30),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidtipoincidenciaemp = 0 then	

		insert into tipoincidenciaemp(desctipoincidenciaemp,quien,cuando)
		values(pdesctipoincidenciaemp,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipoincidenciaemp SET
			desctipoincidenciaemp=pdesctipoincidenciaemp,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtipoincidenciaemp = pidtipoincidenciaemp;

		SET last_id = pidtipoincidenciaemp;
	end if;

	commit;
end$$

DELIMITER ;

