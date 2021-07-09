DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregable_del $$

CREATE PROCEDURE sp_entregable_del(IN pidentregable int)  

begin

    delete from entregable
    where identregable=pidentregable;

    commit;

end$$

DELIMITER ;      