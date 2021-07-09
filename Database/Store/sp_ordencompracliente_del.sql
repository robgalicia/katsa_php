DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompracliente_del $$

CREATE PROCEDURE sp_ordencompracliente_del(IN pidordencompracliente int)
begin
    delete from ordencompracliente
    where idordencompracliente=pidordencompracliente;

    commit;
end$$

DELIMITER ;