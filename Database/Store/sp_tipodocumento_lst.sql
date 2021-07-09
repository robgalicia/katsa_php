DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipodocumento_lst $$

CREATE PROCEDURE sp_tipodocumento_lst()  
begin
	select idtipodocumento, desctipodocumento, ifnull(solicitarvigencia,'N') as solicitarvigencia
	from tipodocumento
	order by desctipodocumento;
end$$

DELIMITER ;
