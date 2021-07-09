DELIMITER $$

DROP PROCEDURE IF EXISTS sp_region_sel $$

CREATE PROCEDURE sp_region_sel(IN pidregion smallint)  
begin
	select 	idregion, descregion, prefijofolio, ifnull(idempleadocompras,0) as idempleadocompras,
			ifnull(idempleadogastos,0) as idempleadogastos
	from region
	where idregion=pidregion;
end$$

DELIMITER ;
