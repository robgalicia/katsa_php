DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clientedomiciliofiscal_lst $$

CREATE PROCEDURE sp_clientedomiciliofiscal_lst(IN pidcliente int)

begin

	select 	idclientedomiciliofiscal, c.nombrecomercial			
	from clientedomiciliofiscal c
	where idcliente = pidcliente
    order by idclientedomiciliofiscal;

end$$

DELIMITER ;