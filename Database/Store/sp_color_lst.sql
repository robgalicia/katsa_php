DELIMITER $$

DROP PROCEDURE IF EXISTS sp_color_lst $$

CREATE PROCEDURE sp_color_lst()  
begin
	select idcolor, desccolor
	from color
	order by desccolor;
end$$

DELIMITER ;
