DELIMITER $$

DROP PROCEDURE IF EXISTS sp_color_del $$

CREATE PROCEDURE sp_color_del(IN pidcolor int)

begin
	delete from color
	where idcolor=pidcolor;

	commit;
end$$

DELIMITER ;

