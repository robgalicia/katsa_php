DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rutatraslado_sel $$

CREATE PROCEDURE sp_rutatraslado_sel(IN pidrutatraslado smallint)
begin
	select 	descrutatraslado, importetarifa, rt.idtipomoneda, tm.abreviacion as tipomoneda
	from rutatraslado rt
        inner join tipomoneda tm on tm.idtipomoneda=rt.idtipomoneda
	where idrutatraslado=pidrutatraslado;

end$$

DELIMITER ;