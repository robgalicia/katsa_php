DELIMITER $$

DROP PROCEDURE IF EXISTS sp_profesion_del $$

CREATE PROCEDURE sp_profesion_del(IN pidprofesion int)

begin
	delete from profesion
	where idprofesion=pidprofesion;
	
	commit;
end$$

DELIMITER ;
