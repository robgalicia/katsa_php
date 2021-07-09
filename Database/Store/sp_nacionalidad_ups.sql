DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nacionalidad_ups $$

CREATE PROCEDURE sp_nacionalidad_ups
(IN pidnacionalidad         int,
IN pdescnacionalidad         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidnacionalidad = 0 then	

		insert into nacionalidad(descnacionalidad,quien,cuando)
		values(pdescnacionalidad,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update nacionalidad SET
			descnacionalidad=pdescnacionalidad,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idnacionalidad = pidnacionalidad;

		SET last_id = pidnacionalidad;
	end if;

	commit;
end$$

DELIMITER ;

