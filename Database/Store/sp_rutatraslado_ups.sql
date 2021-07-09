DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rutatraslado_ups $$

CREATE PROCEDURE sp_rutatraslado_ups
(IN pidrutatraslado     smallint,
IN pdescrutatraslado    varchar(100),
IN pimportetarifa       decimal(10,2),
IN pidtipomoneda        smallint,
IN pquien               varchar(15),
 OUT last_id INT)  

begin
	if pidrutatraslado = 0 then	
		insert into rutatraslado(descrutatraslado,importetarifa,idtipomoneda,quien,cuando)
		values(pdescrutatraslado,pimportetarifa,pidtipomoneda,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update rutatraslado SET
				descrutatraslado=pdescrutatraslado,
				importetarifa=pimportetarifa,
				idtipomoneda=pidtipomoneda,
				quien=pquien,
				cuando=fn_fecha_actual()
		where idrutatraslado = pidrutatraslado;

		SET last_id = pidrutatraslado;
	end if;

	commit;
end$$

DELIMITER ;

