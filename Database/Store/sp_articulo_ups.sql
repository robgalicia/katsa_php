DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_ups $$

CREATE PROCEDURE sp_articulo_ups
(IN pidarticulo          int,
IN pcodigoarticulo       varchar(20),
IN pdescarticulo         varchar(100),
IN pdescarticuloprov     varchar(100),
IN pidunidadmedida       smallint,
IN pidpartidagto         smallint,
IN pidpartidacto         smallint,
IN pidpartidainv         smallint,
IN pidproveedor          int,
IN pquien                varchar(15),
 OUT last_id INT)

begin

	if pidarticulo = 0 then	

		insert into articulo(codigoarticulo,descarticulo,descarticuloprov,idunidadmedida,idpartidagto,idpartidacto,idpartidainv,idproveedor,quien,cuando)
		values(pcodigoarticulo,pdescarticulo,pdescarticuloprov,pidunidadmedida,pidpartidagto,pidpartidacto,pidpartidainv,pidproveedor,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update articulo SET
			codigoarticulo=pcodigoarticulo,
			descarticulo=pdescarticulo,
			descarticuloprov=pdescarticuloprov,
			idunidadmedida=pidunidadmedida,
			idpartidagto=pidpartidagto,
			idpartidacto=pidpartidacto,
			idpartidainv=pidpartidainv,
			idproveedor=pidproveedor,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idarticulo = pidarticulo;

		SET last_id = pidarticulo;
	end if;

	commit;
end$$

DELIMITER ;

