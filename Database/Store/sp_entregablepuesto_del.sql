DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregablepuesto_del $$

CREATE PROCEDURE sp_entregablepuesto_del(IN pidentregablepuesto int)  

begin

    delete from entregablepuesto
    where identregablepuesto=pidentregablepuesto;

	commit;
end$$

DELIMITER ;