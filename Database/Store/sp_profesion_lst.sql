DELIMITER $$

DROP PROCEDURE IF EXISTS sp_profesion_lst $$

CREATE PROCEDURE sp_profesion_lst()  
begin
	select idprofesion, descprofesion
	from profesion
	order by descprofesion;
end$$

DELIMITER ;
