DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_del $$

CREATE PROCEDURE sp_articulo_del(IN pidarticulo int)

begin
	delete from articulo
	where idarticulo=pidarticulo;
	
	commit;
end$$

DELIMITER ;
