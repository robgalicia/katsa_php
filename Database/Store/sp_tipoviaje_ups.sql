DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoviaje_ups $$

CREATE PROCEDURE sp_tipoviaje_ups
(IN pidtipoviaje     smallint,
IN pdesctipoviaje    varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidtipoviaje = 0 then	

		insert into tipoviaje(desctipoviaje,quien,cuando)
		values(pdesctipoviaje,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipoviaje SET
			desctipoviaje=pdesctipoviaje,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtipoviaje = pidtipoviaje;

		SET last_id = pidtipoviaje;
	end if;

	commit;
end$$

DELIMITER ;