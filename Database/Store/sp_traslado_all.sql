DELIMITER $$

DROP PROCEDURE IF EXISTS sp_traslado_all $$

CREATE PROCEDURE sp_traslado_all
(IN panio int, 
IN pmes smallint)
begin
	select 	idtraslado, folio, fechaservicio, ifnull(solicitante,'') as solicitante, ifnull(empresa,'') as empresa,
			case tiposervicio when 'M' then 'MATERIAL' when 'P' then 'PERSONAL' else 'INDEFINIDO' end as tiposervicio,
			ifnull(rt.descrutatraslado,'') as descrutatraslado, ifnull(fechacierre,'') as fechacierre
	from traslado t
		left outer join rutatraslado rt on rt.idrutatraslado=t.idrutatraslado
	where year(fechaservicio)=panio and month(fechaservicio)=pmes
	order by fechaservicio desc;
end$$

DELIMITER ;
