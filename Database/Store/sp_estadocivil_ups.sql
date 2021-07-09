DELIMITER $$

DROP PROCEDURE IF EXISTS sp_estadocivil_ups $$

CREATE PROCEDURE sp_estadocivil_ups
(IN pidestadocivil 		smallint,
IN pdescestadocivil		varchar(30),
IN pquien           varchar(15),
 OUT last_id INT)  

begin
	if pidestadocivil = 0 then	

		insert into estadocivil(descestadocivil,quien,cuando)
		values(pdescestadocivil,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update estadocivil SET
			descestadocivil=pdescestadocivil,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idestadocivil = pidestadocivil;

		SET last_id = pidestadocivil;
	end if;

	commit;
end$$

DELIMITER ;

