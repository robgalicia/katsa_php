DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregable_sel $$

CREATE PROCEDURE sp_entregable_sel(IN pidentregable int)

begin

    select  e.identregable, e.descentregable,
            e.iddepartamento, d.descdepartamento,
            e.idcategoria, c.desccategoria
    from entregable e
        inner join departamento d on d.iddepartamento=e.iddepartamento
        inner join categoria c on c.idcategoria=e.idcategoria
    where e.identregable=pidentregable;

end$$

DELIMITER ;      