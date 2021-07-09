DELIMITER $$

DROP PROCEDURE IF EXISTS sp_estadocivil_all $$

CREATE PROCEDURE sp_estadocivil_all()
begin

	select idestadocivil, descestadocivil
	from estadocivil
	order by idestadocivil;

end$$

DELIMITER ;
