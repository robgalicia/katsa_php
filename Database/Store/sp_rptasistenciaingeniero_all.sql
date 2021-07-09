DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptasistenciaingeniero_all $$

CREATE PROCEDURE sp_rptasistenciaingeniero_all
(
IN pidregion       smallint,
IN pidadscripcion   smallint,
IN pidcliente       int,
IN pfecha           datetime,
IN pgrupo           tinyint,
IN ptipolista       char(1)  
)
begin
	select  case when AI.tipovehiculo = 'U' then 'URBAN' when AI.tipovehiculo =  'V' then 'VEHICULO PROPIO' else 'ACOMPAÑANTE' end as tipovehiculo,
            case when isnull(I.idsubcontrata) = 1 then I.nombre else concat(I.nombre, ' (', S.nombreempresa,')') end as nombreingeniero,
            ifnull(AI.numeconomico,'') as numeconomico, AI.grupo,
            case when AI.tipolista = 'S' then 'SUBIDA' else 'BAJADA' end as tipolista,
            cast(AI.fecha as date) as fecha, AI.latitud, AI.longitud
    from asistenciaingeniero AI
    inner join ingeniero I on AI.idingeniero = I.idingeniero
    left outer join subcontrata S on S.idsubcontrata = I.idsubcontrata
    where AI.idcliente = pidcliente
    and AI.idregion = pidregion
    and AI.idadscripcion = pidadscripcion
    and cast(AI.fecha as date) = cast(pfecha as date)
    and AI.grupo = pgrupo
    and AI.tipolista = ptipolista
    order by nombre;
end$$

DELIMITER ;