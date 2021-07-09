DELIMITER $$

DROP PROCEDURE IF EXISTS sp_region_all $$

CREATE PROCEDURE sp_region_all()  
begin
	select  idregion, descregion, prefijofolio, ifnull(idempleadocompras,0) as idempleadocompras,
			ifnull(idempleadogastos,0) as idempleadogastos
	from region
	order by idregion;
end$$

DELIMITER ;
