DELIMITER $$

DROP PROCEDURE IF EXISTS sp_marcavehiculo_lst $$

CREATE PROCEDURE sp_marcavehiculo_lst()
begin
	select 	idmarcavehiculo, descmarcavehiculo
	from marcavehiculo
	order by descmarcavehiculo;
end$$

DELIMITER ;

