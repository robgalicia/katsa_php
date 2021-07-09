DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregable_all $$

CREATE PROCEDURE sp_entregable_all(IN piddepartamento smallint, IN pidcategoria smallint)  

begin

    select e.identregable, e.descentregable,
    ifnull((select ep.idpuesto from entregablepuesto ep 
	where ep.identregable=e.identregable limit 1),0) as idpuesto,
	ifnull((select p.descpuesto from entregablepuesto ep inner join puesto p on p.idpuesto=ep.idpuesto
	where ep.identregable=e.identregable limit 1),'PENDIENTE') as descpuesto
    from entregable e
    where e.iddepartamento=piddepartamento and e.idcategoria=pidcategoria
    order by e.descentregable;

end$$

DELIMITER ;      