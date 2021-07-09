DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipodocumento_all $$

CREATE PROCEDURE sp_tipodocumento_all()  
begin
	select idtipodocumento, desctipodocumento, solicitarvigencia, obligatorioempleado, obligatoriosnsp, obligatoriocliente
	from tipodocumento
	order by desctipodocumento;
end$$

DELIMITER ;
