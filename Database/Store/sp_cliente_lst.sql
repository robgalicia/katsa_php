DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cliente_lst $$

CREATE PROCEDURE sp_cliente_lst()  
begin
	select idcliente, nombre
	from cliente
	order by nombre;
end$$

DELIMITER ;
