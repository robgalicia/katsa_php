DELIMITER $$

DROP TRIGGER IF EXISTS tgra_ordencomprafactura_ins $$
 
CREATE TRIGGER tgra_ordencomprafactura_ins AFTER INSERT ON ordencomprafactura
 FOR EACH ROW 
 
BEGIN

 DECLARE v_finished INTEGER DEFAULT 0;

 declare vidproveedor int;
 declare vnombreproveedor varchar(50);
 declare vfechafactura datetime;
 declare vfolioordencompra varchar(12);
 declare vidarticulo int;
 declare vcantidad int;
 declare vimporte decimal(10,2);

 declare vidalmacen smallint;


 DECLARE cur_detalle CURSOR FOR
	select 	oc.idproveedor, p.nombre, ocf.fechafactura, oc.folio,
			ocd.idarticulo, ocd.cantidad, ocd.importe
	from ordencompradetalle ocd
		inner join ordencompra oc on oc.idordencompra=ocd.idordencompra
		inner join ordencomprafactura ocf on ocf.idordencompra=ocd.idordencompra
		inner join proveedor p on p.idproveedor=ocf.idproveedor
	where ocd.idordencompra=new.idordencompra;

 DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_finished = 1;

 select ifnull(a.idalmacen,1) into vidalmacen
 from ordencompra oc
	left outer join almacen a on a.idregion=oc.idregion
 where oc.idordencompra=new.idordencompra;

 OPEN cur_detalle;
 get_cursor: LOOP
 
	FETCH cur_detalle
	INTO vidproveedor, vnombreproveedor, vfechafactura, vfolioordencompra, vidarticulo, vcantidad, vimporte;
	IF v_finished = 1 THEN 
		LEAVE get_cursor;
	END IF;

	IF not exists (select idinventario from inventario where idarticulo = vidarticulo and idalmacen=vidalmacen) THEN
	   insert into inventario (idarticulo, idalmacen, idproveedor, existencia, costounitario, quien, cuando) 
	   values (vidarticulo, vidalmacen, vidproveedor, 0, 0.0, new.quien, fn_fecha_actual());	   
	END IF;

	update inventario set
		existencia = existencia + vcantidad,
		idproveedor = vidproveedor,
		costounitario = vimporte,
		quien = new.quien,
		cuando = fn_fecha_actual()
	where idarticulo = vidarticulo and idalmacen=vidalmacen;
	
	update articulo set 
	   existencia = ifnull(existencia,0) + vcantidad,
	   fechaultimacompra = vfechafactura,
	   preciocompra = vimporte,
	   idproveedor = vidproveedor,
	   quien = new.quien,
	   cuando = fn_fecha_actual()
	where idarticulo = vidarticulo;

	INSERT INTO kardex(idarticulo, idalmacen, fechamovimiento, documentoreferencia, folioreferencia, tipomovimiento, cantidad, 
						existenciaactual, costounitario, costopromedio, observaciones, valorllave, quien, cuando)
	VALUES (vidarticulo, vidalmacen,  vfechafactura, 'ORDEN COMPRA', vfolioordencompra, 'E', vcantidad,
			(select ifnull(existencia,0) from inventario where idarticulo = vidarticulo and idalmacen=vidalmacen),
			vimporte, vimporte, vnombreproveedor, new.idordencompra, new.quien, fn_fecha_actual());
	
END LOOP get_cursor;
CLOSE cur_detalle;
 
END$$


DELIMITER ;
