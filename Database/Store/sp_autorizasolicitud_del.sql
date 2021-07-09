DELIMITER $$

DROP PROCEDURE IF EXISTS sp_autorizasolicitud_del $$

CREATE PROCEDURE sp_autorizasolicitud_del(IN pidautorizasolicitud smallint)  
begin
	delete from autorizasolicitud
	where idautorizasolicitud=pidautorizasolicitud;

    commit;
end$$

DELIMITER ;