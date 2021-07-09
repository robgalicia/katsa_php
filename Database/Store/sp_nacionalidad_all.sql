DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nacionalidad_all $$

CREATE PROCEDURE sp_nacionalidad_all()
begin
	select 	idnacionalidad, descnacionalidad
	from nacionalidad
	order by descnacionalidad;

end$$

DELIMITER ;
