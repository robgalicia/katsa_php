DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cliente_del $$

CREATE PROCEDURE sp_cliente_del(IN pidcliente int)

begin
	delete from cliente
	where idcliente=pidcliente;

	commit;
end$$

DELIMITER ;

