DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_partida $$

CREATE PROCEDURE sp_gastoscomprobardetalle_partida(IN pidgastoscomprobar int)
begin
	select 	gcd.idgastoscomprobardetalle, p.descpartida, gcd.cantidad, gcd.importe, gcd.total,
			ifnull(gcd.justificacion,'') as justificacion
	from gastoscomprobardetalle gcd
		inner join partida p on p.idpartida=gcd.idpartida
	where idgastoscomprobar=pidgastoscomprobar
	order by p.descpartida;
end$$

DELIMITER ;
