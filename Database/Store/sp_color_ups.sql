DELIMITER $$

DROP PROCEDURE IF EXISTS sp_color_ups $$

CREATE PROCEDURE sp_color_ups
(IN pidcolor     smallint,
IN pdesccolor       varchar(50),
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidcolor = 0 then	

		insert into color(idcolor,desccolor,quien,cuando)
		values(pidcolor,pdesccolor,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update color SET
			idcolor=pidcolor,
			desccolor=pdesccolor,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idcolor = pidcolor;

		SET last_id = pidcolor;
	end if;

	commit;
end$$

DELIMITER ;

