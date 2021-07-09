DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoajusteinventario_ups $$

CREATE PROCEDURE sp_tipoajusteinventario_ups
(IN pidtipoajusteinventario     smallint,
IN pdesctipoajusteinventario    varchar(50),
IN ptipomovimiento         		char(1),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidtipoajusteinventario = 0 then	

		insert into tipoajusteinventario(desctipoajusteinventario,tipomovimiento,quien,cuando)
		values(pdesctipoajusteinventario,ptipomovimiento,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipoajusteinventario SET
			desctipoajusteinventario=pdesctipoajusteinventario,
			tipomovimiento=ptipomovimiento,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtipoajusteinventario = pidtipoajusteinventario;

		SET last_id = pidtipoajusteinventario;
	end if;

	commit;
end$$

DELIMITER ;