DELIMITER $$

DROP PROCEDURE IF EXISTS sp_region_ups $$

CREATE PROCEDURE sp_region_ups
(IN pidregion 		smallint,
IN pdescregion		varchar(50),
IN pprefijofolio	char(1),
IN pidempleadocompras int,
IN pidempleadogastos int,
IN pquien           varchar(15),
 OUT last_id INT)  

begin
	if pidregion = 0 then	

		insert into region(descregion,prefijofolio,idempleadocompras,idempleadogastos,quien,cuando)
		values(pdescregion,pprefijofolio,pidempleadocompras,pidempleadogastos,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update region SET
			descregion=pdescregion,
			prefijofolio=pprefijofolio,
			idempleadocompras=pidempleadocompras,
			idempleadogastos=pidempleadogastos,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idregion = pidregion;

		SET last_id = pidregion;
	end if;

	commit;
end$$

DELIMITER ;

