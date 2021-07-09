DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ingeniero_ups $$

CREATE PROCEDURE sp_ingeniero_ups
(IN pidingeniero         int,
IN pnombre               varchar(50),
IN pidcliente            int,
IN pidsubcontrata        smallint,
IN pactivo               tinyint,
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidingeniero = 0 then	

		insert into ingeniero(nombre,idcliente,idsubcontrata,activo,quien,cuando)
		values(pnombre,pidcliente,pidsubcontrata,pactivo,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update ingeniero SET
			nombre=pnombre,
            idcliente=pidcliente,
            idsubcontrata=pidsubcontrata,
			activo=pactivo,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idingeniero = pidingeniero;

		SET last_id = pidingeniero;
	end if;

	commit;
end$$

DELIMITER ;
