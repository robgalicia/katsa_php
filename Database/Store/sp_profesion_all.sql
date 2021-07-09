DELIMITER $$

DROP PROCEDURE IF EXISTS sp_profesion_all $$

CREATE PROCEDURE sp_profesion_all()
begin
	select 	idprofesion, descprofesion
	from profesion
	order by descprofesion;

end$$

DELIMITER ;