DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clientedomiciliofiscal_del $$

CREATE PROCEDURE sp_clientedomiciliofiscal_del(IN pidclientedomiciliofiscal int)

begin
	delete from clientedomiciliofiscal
	where idclientedomiciliofiscal=pidclientedomiciliofiscal;

	commit;
end$$

DELIMITER ;
