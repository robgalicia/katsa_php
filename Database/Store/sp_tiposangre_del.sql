DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposangre_del $$

CREATE PROCEDURE sp_tiposangre_del(IN pidtiposangre int)

begin
	delete from tiposangre
	where idtiposangre=pidtiposangre;
	
	commit;
end$$

DELIMITER ;
