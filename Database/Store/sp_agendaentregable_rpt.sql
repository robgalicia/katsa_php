DELIMITER $$

DROP PROCEDURE IF EXISTS sp_agendaentregable_rpt $$

CREATE PROCEDURE sp_agendaentregable_rpt
(IN pidpuesto smallint,
IN pidcategoria smallint,
IN pfechaini date, 
IN pfechafin date)  

begin

    select  convert(ae.fechacompromiso,date) as fecha,
            p.descpuesto,
            e.descentregable, 
            ae.cantidadentregable as cantidad,
            fn_cumplimientoentregable_absoluto(ae.idagendaentregable) as cumplidos
    from agendaentregable ae
        inner join entregable e on e.identregable=ae.identregable
        inner join puesto p on p.idpuesto=ae.idpuesto
    where ae.idpuesto=pidpuesto and e.idcategoria=pidcategoria
    and convert(ae.fechacompromiso,date) between pfechaini and pfechafin
    order by ae.fechacompromiso;

end$$

DELIMITER ;