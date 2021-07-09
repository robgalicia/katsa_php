DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposangre_all $$

CREATE PROCEDURE sp_tiposangre_all()
begin
	select 	idtiposangre, desctiposangre
	from tiposangre
	order by desctiposangre;

end$$

DELIMITER ;