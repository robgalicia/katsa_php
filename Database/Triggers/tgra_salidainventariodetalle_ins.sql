DELIMITER $$

DROP TRIGGER IF EXISTS tgra_salidainventariodetalle_ins $$
 
CREATE TRIGGER tgra_salidainventariodetalle_ins AFTER INSERT ON salidainventariodetalle
 FOR EACH ROW 
 
BEGIN

	declare vidalmacen smallint;
	declare vfolio varchar(12);
	declare vfechasalida datetime;

	select ifnull(idalmacen,1), folio, fechasalida 
	into vidalmacen, vfolio, vfechasalida
	from salidainventario
	where idsalidainventario=new.idsalidainventario;

	IF exists (select idinventario from inventario where idarticulo = new.idarticulo and idalmacen=vidalmacen) THEN

		update inventario set
			existencia = existencia - new.cantidad,
			quien = new.quien,
			cuando = fn_fecha_actual()
		where idarticulo = new.idarticulo and idalmacen=vidalmacen;
	
		update articulo set 
		  existencia = ifnull(existencia,0) - new.cantidad,
		  quien = new.quien,
		  cuando = fn_fecha_actual()
		where idarticulo = new.idarticulo;

		INSERT INTO kardex(idarticulo, idalmacen, fechamovimiento, documentoreferencia, folioreferencia, tipomovimiento, cantidad, 
						existenciaactual, costounitario, costopromedio, observaciones, valorllave, quien, cuando)
		VALUES (new.idarticulo, vidalmacen,  vfechasalida, 'SALIDA INVENTARIO', vfolio, 'S', new.cantidad,
			(select ifnull(existencia,0) from inventario where idarticulo = new.idarticulo and idalmacen=vidalmacen),
			new.costounitario, new.costounitario, null, new.idsalidainventario, new.quien, fn_fecha_actual());
	
	END IF;

 
END$$


DELIMITER ;
