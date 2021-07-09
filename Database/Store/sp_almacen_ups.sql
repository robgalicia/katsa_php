DELIMITER $$

DROP PROCEDURE IF EXISTS sp_almacen_ups $$

CREATE PROCEDURE sp_almacen_ups
(IN pidalmacen         smallint,
IN pidregion         smallint,
IN pdescalmacen         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidalmacen = 0 then	

		insert into almacen(idregion,descalmacen,quien,cuando)
		values(pidregion,pdescalmacen,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update almacen SET
			idregion=pidregion,
            descalmacen=pdescalmacen,		
			quien=pquien,
			cuando=fn_fecha_actual()
		where idalmacen = pidalmacen;

		SET last_id = pidalmacen;
	end if;

	commit;
end$$

DELIMITER ;

