DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoparentesco_ups $$

CREATE PROCEDURE sp_tipoparentesco_ups
(IN pidtipoparentesco       smallint,
IN pdesctipoparentesco      varchar(50),
IN pquien            		varchar(15),
 OUT last_id INT)

begin
	if pidtipoparentesco = 0 then	

		insert into tipoparentesco(desctipoparentesco,quien,cuando)
		values(pdesctipoparentesco,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipoparentesco SET
			desctipoparentesco=pdesctipoparentesco,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtipoparentesco = pidtipoparentesco;

		SET last_id = pidtipoparentesco;
	end if;

	commit;
end$$

DELIMITER ;

