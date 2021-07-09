DELIMITER $$

DROP PROCEDURE IF EXISTS sp_consumogasolina_del $$

CREATE PROCEDURE sp_consumogasolina_del
(
    IN pidconsumogasolina    int
)

begin
    
    delete from consumogasolina
    where idconsumogasolina = pidconsumogasolina;        

	commit;
end$$

DELIMITER ;