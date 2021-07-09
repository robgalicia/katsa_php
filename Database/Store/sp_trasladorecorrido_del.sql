DELIMITER $$

DROP PROCEDURE IF EXISTS sp_trasladorecorrido_del $$

CREATE PROCEDURE sp_trasladorecorrido_del(IN pidtrasladorecorrido int)

begin

    delete from trasladorecorrido
    where idtrasladorecorrido=pidtrasladorecorrido;
    	
	commit;
end$$

DELIMITER ;