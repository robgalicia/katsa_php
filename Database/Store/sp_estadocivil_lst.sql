DELIMITER $$

DROP PROCEDURE IF EXISTS sp_estadocivil_lst $$

CREATE PROCEDURE sp_estadocivil_lst()  
begin
	select idestadocivil, descestadocivil
	from estadocivil
	order by descestadocivil;
end$$

DELIMITER ;
