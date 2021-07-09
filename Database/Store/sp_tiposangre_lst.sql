DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposangre_lst $$

CREATE PROCEDURE sp_tiposangre_lst()  
begin
	select idtiposangre, desctiposangre
	from tiposangre
	order by desctiposangre;
end$$

DELIMITER ;
