DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rutatraslado_lst $$

CREATE PROCEDURE sp_rutatraslado_lst()
begin
	select 	idrutatraslado, descrutatraslado, importetarifa, tm.abreviacion as tipomoneda
	from rutatraslado rt
        inner join tipomoneda tm on tm.idtipomoneda=rt.idtipomoneda
	order by descrutatraslado;

end$$

DELIMITER ;