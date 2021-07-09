DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoviaje_del $$

CREATE PROCEDURE sp_tipoviaje_del(IN pidtipoviaje int)

begin
	delete from tipoviaje
	where idtipoviaje=pidtipoviaje;
	
	commit;
end$$

DELIMITER ;