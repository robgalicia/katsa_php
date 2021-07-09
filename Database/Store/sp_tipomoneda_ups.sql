DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipomoneda_ups $$

CREATE PROCEDURE sp_tipomoneda_ups
(IN pidtipomoneda   smallint,
IN pdesctipomoneda  varchar(50),
IN pabreviacion     varchar(5),
IN pquien           varchar(15),
 OUT last_id INT)

begin
	if pidtipomoneda = 0 then	

		insert into tipomoneda(desctipomoneda,abreviacion,quien,cuando)
		values(pdesctipomoneda,pabreviacion,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipomoneda SET
			desctipomoneda=pdesctipomoneda,
            abreviacion=pabreviacion,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtipomoneda = pidtipomoneda;

		SET last_id = pidtipomoneda;
	end if;

	commit;
end$$

DELIMITER ;

