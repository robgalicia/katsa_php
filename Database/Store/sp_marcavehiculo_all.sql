DELIMITER $$

DROP PROCEDURE IF EXISTS sp_marcavehiculo_all $$

CREATE PROCEDURE sp_marcavehiculo_all()
begin
	select 	idmarcavehiculo, descmarcavehiculo
	from marcavehiculo
	order by descmarcavehiculo;

end$$

DELIMITER ;