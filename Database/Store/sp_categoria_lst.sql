DELIMITER $$

DROP PROCEDURE IF EXISTS sp_categoria_lst $$

CREATE PROCEDURE sp_categoria_lst()
begin
	select 	idcategoria, desccategoria
	from categoria
	order by desccategoria;

end$$

DELIMITER ;
