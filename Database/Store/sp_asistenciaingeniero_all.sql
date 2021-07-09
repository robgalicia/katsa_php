DELIMITER $$

DROP PROCEDURE IF EXISTS sp_asistenciaingeniero_all $$

CREATE PROCEDURE sp_asistenciaingeniero_all
(IN pidregion       smallint,
IN pidadscripcion   smallint,
IN pidcliente       int,
IN pfecha           datetime,
IN pgrupo           tinyint,
IN ptipolista       char(1))
begin

	select 	i.idingeniero,
		case isnull(i.idsubcontrata) when 1 then i.nombre else concat(i.nombre, ' (', s.nombreempresa,')') end as nombreingeniero,
        ifnull((select a.idasistenciaingeniero from asistenciaingeniero a
                where a.idregion=pidregion and a.idadscripcion=pidadscripcion
                and a.idcliente=pidcliente 
                and convert(a.fecha, date)=convert(pfecha, date)
                and a.grupo=pgrupo and a.tipolista=ptipolista
                and a.idingeniero=i.idingeniero
                limit 1), 0) as idasistenciaingeniero,

                ifnull((select a.tipovehiculo from asistenciaingeniero a
                where a.idregion=pidregion and a.idadscripcion=pidadscripcion
                and a.idcliente=pidcliente 
                and convert(a.fecha, date)=convert(pfecha, date)
                and a.grupo=pgrupo and a.tipolista=ptipolista
                and a.idingeniero=i.idingeniero
                limit 1), 'U') as tipovehiculo,

                ifnull((select a.numeconomico from asistenciaingeniero a
                where a.idregion=pidregion and a.idadscripcion=pidadscripcion
                and a.idcliente=pidcliente 
                and convert(a.fecha, date)=convert(pfecha, date)
                and a.grupo=pgrupo and a.tipolista=ptipolista
                and a.idingeniero=i.idingeniero
                limit 1), '') as numeconomico
    from ingeniero i
        left outer join subcontrata s on s.idsubcontrata=i.idsubcontrata
    where idcliente=pidcliente
    and activo=1
    order by nombre;

end$$

DELIMITER ;
