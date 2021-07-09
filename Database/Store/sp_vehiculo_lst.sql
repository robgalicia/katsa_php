DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculo_lst $$

CREATE PROCEDURE sp_vehiculo_lst()  
begin
	select v.idvehiculo, v.placas, concat_ws(' ', mv.descmarcavehiculo, v.submarca, v.aniomodelo, 'PLACAS', v.placas) as vehiculo
	from vehiculo v
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
	where v.idestatus=6	-- Activo
	order by mv.descmarcavehiculo, v.submarca; 
end$$

DELIMITER ;