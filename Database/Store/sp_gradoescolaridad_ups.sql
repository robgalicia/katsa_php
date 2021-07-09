DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gradoescolaridad_ups $$

CREATE PROCEDURE sp_gradoescolaridad_ups
(IN pidgradoescolaridad         int,
IN pdescgradoescolaridad         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidgradoescolaridad = 0 then	

		insert into gradoescolaridad(descgradoescolaridad,quien,cuando)
		values(pdescgradoescolaridad,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update gradoescolaridad SET
			descgradoescolaridad=pdescgradoescolaridad,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idgradoescolaridad = pidgradoescolaridad;

		SET last_id = pidgradoescolaridad;
	end if;

	commit;
end$$

DELIMITER ;