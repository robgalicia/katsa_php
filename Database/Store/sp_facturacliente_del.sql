DELIMITER $$

DROP PROCEDURE IF EXISTS sp_facturacliente_del $$

CREATE PROCEDURE sp_facturacliente_del(IN pidfacturacliente int)

begin

    delete from facturacliente
    where idfacturacliente=pidfacturacliente;
    
    commit;
end$$

DELIMITER ;    