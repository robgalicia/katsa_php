DELIMITER $$

DROP PROCEDURE IF EXISTS sp_hojatraslado_all $$

CREATE PROCEDURE sp_hojatraslado_all(IN panio smallint, IN pmes smallint)
begin
    select  ht.idhojatraslado, ht.idtraslado, ht.numhojatraslado, 
            case ht.tiposervicio when 'P' then 'PERSONAL' else 'MATERIAL' end as tiposervicio, 
            t.folio, t.fechaservicio, t.solicitante, t.empresa, rt.descrutatraslado
    from hojatraslado ht
        inner join traslado t on t.idtraslado=ht.idtraslado
        inner join rutatraslado rt on rt.idrutatraslado=t.idrutatraslado
    where year(t.fechaservicio)=panio and month(t.fechaservicio)=pmes
    order by t.folio, ht.numhojatraslado;
end$$

DELIMITER ;