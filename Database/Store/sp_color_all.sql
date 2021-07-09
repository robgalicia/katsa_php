DELIMITER $$

DROP PROCEDURE IF EXISTS sp_color_all $$

CREATE PROCEDURE sp_color_all()

begin
	select 	idcolor, desccolor		
	from color
	order by idcolor;
end$$

DELIMITER ;

