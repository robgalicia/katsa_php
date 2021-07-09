DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipomoneda_del $$

CREATE PROCEDURE sp_tipomoneda_del(IN pidtipomoneda smallint)
begin
	delete from tipomoneda
	where idtipomoneda=pidtipomoneda;

    commit;
end$$

DELIMITER ;