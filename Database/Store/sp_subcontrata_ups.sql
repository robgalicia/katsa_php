DELIMITER $$

DROP PROCEDURE IF EXISTS sp_subcontrata_ups $$

CREATE PROCEDURE sp_subcontrata_ups
(IN pidsubcontrata 		smallint,
IN pnombreempresa		varchar(50),
IN pquien           varchar(15),
 OUT last_id INT)  

begin
	if pidsubcontrata = 0 then	

		insert into subcontrata(nombreempresa,quien,cuando)
		values(pnombreempresa,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update subcontrata SET
			nombreempresa=pnombreempresa,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idsubcontrata = pidsubcontrata;

		SET last_id = pidsubcontrata;
	end if;

	commit;
end$$

DELIMITER ;

