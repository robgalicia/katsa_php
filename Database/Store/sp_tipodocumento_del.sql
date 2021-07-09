DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipodocumento_del $$

CREATE PROCEDURE sp_tipodocumento_del(IN pidtipodocumento smallint)  
begin
	delete from tipodocumento
	where idtipodocumento=pidtipodocumento;
	
	commit;
end$$

DELIMITER ;
