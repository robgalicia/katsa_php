DELIMITER $$

DROP PROCEDURE IF EXISTS sp_aseguradora_del $$

CREATE PROCEDURE sp_aseguradora_del(IN pidaseguradora smallint)  
begin
	delete from aseguradora
	where idaseguradora=pidaseguradora;

    commit;
end$$

DELIMITER ;