DELIMITER $$

DROP PROCEDURE IF EXISTS sp_agendaentregable_all $$

CREATE PROCEDURE sp_agendaentregable_all
(IN pidpuesto smallint,
IN pidcategoria smallint,
IN pmes smallint,
IN panio smallint)  

begin

    select ae.idagendaentregable, e.descentregable, ae.cantidadentregable as cantidad,
            fn_cumplimientoentregable_absoluto(ae.idagendaentregable) as cumplidos,
            ae.fechacompromiso
    from agendaentregable ae
        inner join entregable e on e.identregable=ae.identregable
    where ae.idpuesto=pidpuesto and e.idcategoria=pidcategoria
    and month(ae.fechacompromiso)=pmes and year(ae.fechacompromiso)=panio
    order by ae.fechacompromiso;

end$$

DELIMITER ;
