DELIMITER $$

DROP PROCEDURE IF EXISTS sp_categoria_all $$

CREATE PROCEDURE sp_categoria_all()
begin
	select 	idcategoria, desccategoria
	from categoria
	order by idcategoria;

end$$

DELIMITER ;
