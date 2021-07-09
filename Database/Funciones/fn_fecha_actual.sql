DELIMITER $$

DROP FUNCTION IF EXISTS fn_fecha_actual $$

create function fn_fecha_actual() returns datetime
begin	
	return date_add(now(), INTERVAL +2 HOUR);
end$$

DELIMITER ;
