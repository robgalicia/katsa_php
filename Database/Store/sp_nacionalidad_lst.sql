DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nacionalidad_lst $$

CREATE PROCEDURE sp_nacionalidad_lst()  
begin
	select idnacionalidad, descnacionalidad
	from nacionalidad
	order by descnacionalidad;
end$$

DELIMITER ;
