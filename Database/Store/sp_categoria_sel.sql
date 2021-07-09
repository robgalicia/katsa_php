DELIMITER $$

DROP PROCEDURE IF EXISTS sp_categoria_sel $$

CREATE PROCEDURE sp_categoria_sel(IN pidcategoria smallint)
begin
	select desccategoria
	from categoria
	where idcategoria=pidcategoria;

end$$

DELIMITER ;