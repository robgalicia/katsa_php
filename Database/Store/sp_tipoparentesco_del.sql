DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoparentesco_del $$

CREATE PROCEDURE sp_tipoparentesco_del(IN pidtipoparentesco smallint)

begin
	delete from tipoparentesco
	where idtipoparentesco=pidtipoparentesco;
	
	commit;
end$$

DELIMITER ;
