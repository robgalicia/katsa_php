DELIMITER $$

DROP PROCEDURE IF EXISTS sp_reporte_traslados $$

CREATE PROCEDURE sp_reporte_traslados(IN panio int, IN pmes smallint)
begin
	select t.folio,t.fechaservicio,ifnull(empresa,'') as empresa,ifnull(solicitante,'') as solicitante,
        rt.descrutatraslado,rt.importetarifa,tm.desctipomoneda,
        case tiposervicio when 'M' then 'MATERIAL' when 'P' then 'PERSONAL' else 'INDEFINIDO' end as tiposervicio     
    from traslado t
        left outer join rutatraslado rt on t.idrutatraslado = rt.idrutatraslado
        left outer join tipomoneda tm on rt.idtipomoneda = tm.idtipomoneda
    where year(fechaservicio)=panio and month(fechaservicio)=pmes
    order by fechaservicio desc;
end$$

DELIMITER ;

