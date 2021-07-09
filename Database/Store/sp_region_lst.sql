DELIMITER $$

DROP PROCEDURE IF EXISTS sp_region_lst $$

CREATE PROCEDURE sp_region_lst()  
begin
	select idregion, descregion
	from region
	order by idregion;
end$$

DELIMITER ;
