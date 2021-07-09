DELIMITER $$

DROP PROCEDURE IF EXISTS sp_bitactividad_ins $$


CREATE PROCEDURE sp_bitactividad_ins
(IN pidsesion       int,
IN popcionsistema   varchar(100),
IN popcionpantalla	varchar(100),
IN pquery			varchar(1000),
IN pdetalleaccion	varchar(1000))
 
begin

	Insert Into bitactividad(idsesion, fecha, opcionsistema, opcionpantalla, query, detalleaccion)
	Values(pidsesion, fn_fecha_actual(), popcionsistema, popcionpantalla, pquery, pdetalleaccion);
	
	commit;
end$$

DELIMITER ;