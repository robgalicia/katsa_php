DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposalidainventario_del $$

CREATE PROCEDURE sp_tiposalidainventario_del(IN pidtiposalidainventario int)

begin
	delete from tiposalidainventario
	where idtiposalidainventario=pidtiposalidainventario;
	
	commit;
end$$

DELIMITER ;
