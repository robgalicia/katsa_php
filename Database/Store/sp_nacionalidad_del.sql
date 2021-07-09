DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nacionalidad_del $$

CREATE PROCEDURE sp_nacionalidad_del(IN pidnacionalidad int)

begin
	delete from nacionalidad
	where idnacionalidad=pidnacionalidad;
	
	commit;
end$$

DELIMITER ;