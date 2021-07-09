DELIMITER $$

DROP TRIGGER IF EXISTS tgra_salidainventario_upd $$
 
CREATE TRIGGER tgra_salidainventario_upd AFTER UPDATE ON salidainventario
 FOR EACH ROW 
 
BEGIN

	DECLARE v_finished INTEGER DEFAULT 0;

	declare vidarticulo int;
	declare vcantidad int;
	declare vcostounitario decimal(10,2);

		 DECLARE cur_detalle CURSOR FOR
			select sid.idarticulo, sid.cantidad, sid.costounitario
			from salidainventariodetalle sid
			where sid.idsalidainventario=new.idsalidainventario;

		 DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_finished = 1;

	if isnull(new.fechacancelacion) = 0 then

		 OPEN cur_detalle;
		 get_cursor: LOOP
		 
			FETCH cur_detalle
			INTO vidarticulo, vcantidad, vcostounitario;
			IF v_finished = 1 THEN 
				LEAVE get_cursor;
			END IF;

			update inventario set
				existencia = existencia + vcantidad,
				quien = new.quien,
				cuando = fn_fecha_actual()
			where idarticulo = vidarticulo and idalmacen=new.idalmacen;
			
			update articulo set 
			   existencia = ifnull(existencia,0) + vcantidad,
			   quien = new.quien,
			   cuando = fn_fecha_actual()
			where idarticulo = vidarticulo;

			INSERT INTO kardex(idarticulo, idalmacen, fechamovimiento, documentoreferencia, folioreferencia, tipomovimiento, cantidad, 
								existenciaactual, costounitario, costopromedio, observaciones, valorllave, quien, cuando)
			VALUES (vidarticulo, new.idalmacen, new.fechacancelacion, 'SALIDA INVENTARIO', new.folio, 'E', vcantidad,
					(select ifnull(existencia,0) from inventario where idarticulo = vidarticulo and idalmacen=new.idalmacen),
					vcostounitario, vcostounitario, 'CANCELACION', new.idsalidainventario, new.quien, fn_fecha_actual());
			
		END LOOP get_cursor;
		CLOSE cur_detalle;

	end if;
 
END$$


DELIMITER ;
