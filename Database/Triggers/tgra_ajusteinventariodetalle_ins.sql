DELIMITER $$

DROP TRIGGER IF EXISTS tgra_ajusteinventariodetalle_ins $$
 
CREATE TRIGGER tgra_ajusteinventariodetalle_ins AFTER INSERT ON ajusteinventariodetalle
 FOR EACH ROW 
 
BEGIN

	declare vidalmacen smallint;
	declare vfolio varchar(12);
	declare vfechaajuste datetime;
	declare vtipomovimiento char(1);
	declare vcantidad int;

	select ifnull(ai.idalmacen,1), ai.folio, ai.fecha, tai.tipomovimiento
	into vidalmacen, vfolio, vfechaajuste, vtipomovimiento
	from ajusteinventario ai
		inner join tipoajusteinventario tai on tai.idtipoajusteinventario=ai.idtipoajusteinventario
	where ai.idajusteinventario=new.idajusteinventario;

	IF not exists (select idinventario from inventario where idarticulo = new.idarticulo and idalmacen=vidalmacen) THEN
		insert into inventario(idarticulo,idalmacen,idproveedor,existencia,costounitario,quien,cuando)
		values(new.idarticulo,vidalmacen,1,0,0,new.quien,fn_fecha_actual());
	END IF;

	set vcantidad = new.cantidad;
	IF vtipomovimiento='S' THEN
		set vcantidad = new.cantidad * -1;
	END IF;

	update inventario set
		existencia = existencia + vcantidad,
		quien = new.quien,
		cuando = fn_fecha_actual()
	where idarticulo = new.idarticulo and idalmacen=vidalmacen;

	update articulo set 
		existencia = ifnull(existencia,0) + vcantidad,
		quien = new.quien,
		cuando = fn_fecha_actual()
	where idarticulo = new.idarticulo;

	INSERT INTO kardex(idarticulo, idalmacen, fechamovimiento, documentoreferencia, folioreferencia, tipomovimiento, cantidad, 
					existenciaactual, costounitario, costopromedio, observaciones, valorllave, quien, cuando)
	VALUES (new.idarticulo, vidalmacen,  vfechaajuste, 'AJUSTE INVENTARIO', vfolio, vtipomovimiento, new.cantidad,
		(select ifnull(existencia,0) from inventario where idarticulo = new.idarticulo and idalmacen=vidalmacen),
		new.costounitario, new.costounitario, null, new.idajusteinventario, new.quien, fn_fecha_actual());
 
END$$


DELIMITER ;
