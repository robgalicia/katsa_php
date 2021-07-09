DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregable_lst $$

CREATE PROCEDURE sp_entregable_lst(IN piddepartamento smallint, IN pidcategoria smallint)  

begin

    select identregable, descentregable
    from entregable
    where iddepartamento=piddepartamento and idcategoria=pidcategoria
    order by descentregable;

end$$

DELIMITER ;      