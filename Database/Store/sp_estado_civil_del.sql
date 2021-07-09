DELIMITER $$

DROP PROCEDURE IF EXISTS sp_estadocivil_del $$

CREATE PROCEDURE sp_estadocivil_del(IN pidestadocivil int)  

begin
	
	delete from estadocivil
	where idestadocivil=pidestadocivil;
	
	commit;

end$$

DELIMITER ;

