DELIMITER $$

DROP PROCEDURE IF EXISTS sp_categoria_del $$

CREATE PROCEDURE sp_categoria_del(IN pidcategoria smallint)
begin
	delete from categoria
	where idcategoria=pidcategoria;

    commit;
end$$

DELIMITER ;