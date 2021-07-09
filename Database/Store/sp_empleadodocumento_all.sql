DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadodocumento_all $$

CREATE PROCEDURE sp_empleadodocumento_all(IN pidempleado int)

begin
	select 	td.idtipodocumento, td.desctipodocumento, td.solicitarvigencia, td.solicitararchivo, td.obligatorioempleado,
			ifnull(ed.nombrearchivo,'') as nombrearchivo,
			ifnull(ed.idempleadodocumento,0) as idempleadodocumento,
			ifnull(ed.idempleado,0) as idempleado,
			ifnull(ed.esoriginal,'') as esoriginal,
			ifnull(ed.folio,'') as folio,
			ifnull(ed.fechaemision,'') as fechaemision,
			ifnull(ed.iniciovigencia,'') as iniciovigencia,
			ifnull(ed.finalvigencia,'') as finalvigencia
	from tipodocumento td
		left outer join empleadodocumento ed on ed.idtipodocumento=td.idtipodocumento and ed.idempleado=pidempleado
	order by td.idtipodocumento;
end$$

DELIMITER ;