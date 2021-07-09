DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipodocumento_sel $$

CREATE PROCEDURE sp_tipodocumento_sel(IN pidtipodocumento smallint)  
begin
	select idtipodocumento, desctipodocumento, solicitarvigencia, obligatorioempleado, obligatoriosnsp, obligatoriocliente
	from tipodocumento
	where idtipodocumento=pidtipodocumento;
end$$

DELIMITER ;
