DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobarfactura_del $$

CREATE PROCEDURE sp_gastoscomprobarfactura_del(IN pidgastoscomprobarfactura  int)

begin
    
    delete from gastoscomprobarfactura
    where idgastoscomprobarfactura=pidgastoscomprobarfactura;

    commit;
end$$

DELIMITER ;