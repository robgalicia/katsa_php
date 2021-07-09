DELIMITER $$

DROP PROCEDURE IF EXISTS sp_profesion_ups $$

CREATE PROCEDURE sp_profesion_ups
(IN pidprofesion         int,
IN pdescprofesion         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidprofesion = 0 then	

		insert into profesion(descprofesion,quien,cuando)
		values(pdescprofesion,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update profesion SET
			descprofesion=pdescprofesion,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idprofesion = pidprofesion;

		SET last_id = pidprofesion;
	end if;

	commit;
end$$

DELIMITER ;