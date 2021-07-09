DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_ordcompra $$

CREATE PROCEDURE sp_requisicion_ordcompra
(IN pidrequisicion int,
IN pidempleado int,
IN pquien varchar(15))
begin
	declare vanterior int;
	declare vfolio varchar(12);
	declare videstatus smallint;
	declare last_id int;
	
	declare vidregion smallint;
	declare viddepartamento smallint;
	declare vidproveedor int;
	declare vidarticulo int;
	declare vcantidad int;
	declare vimporte decimal(12,2);
	declare vtotal decimal(12,2);
	
	DECLARE v_finished INTEGER DEFAULT 0;

	DECLARE cur_requi CURSOR FOR
 	select 	req.idregion, req.iddepartamento, det.idproveedor, det.idarticulo, det.cantidad, det.importe, det.total 
	from requisicion req
		inner join requisiciondetalle det on det.idrequisicion=req.idrequisicion
	where req.idrequisicion=pidrequisicion
	and req.idestatus=11	-- AUTORIZADO
	order by det.idproveedor;
  
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_finished = 1;

	-- Se debe generar una orden de compra por cada proveedor
	set vanterior = 0;
	set videstatus=23;	-- Preorden

	OPEN cur_requi;
	get_cursor: LOOP
 
		FETCH cur_requi
		INTO vidregion, viddepartamento, vidproveedor, vidarticulo, vcantidad, vimporte, vtotal;
		IF v_finished = 1 THEN 
			LEAVE get_cursor;
		END IF;

		-- Nueva orden de compra
		if vidproveedor != vanterior then
			-- folio de la orden de compra
			call sp_folioordencompra(@folio);
			set vfolio=@folio;

			insert into ordencompra(folio,idrequisicion,idproveedor,idregion,iddepartamento,fechaorden,idempleadoordena,importetotal,idestatus,quien,cuando)
			values(vfolio,pidrequisicion,vidproveedor,vidregion,viddepartamento,fn_fecha_actual(),pidempleado,0,videstatus,pquien,fn_fecha_actual());

			set last_id = LAST_INSERT_ID();
		end if;

		insert into ordencompradetalle(idordencompra,idarticulo,cantidad,importe,total,quien,cuando)
		values(last_id,vidarticulo,vcantidad,vimporte,vtotal,pquien,fn_fecha_actual());

		update ordencompra set 
			importetotal = (select sum(total) from ordencompradetalle where idordencompra=last_id)
		where idordencompra=last_id;

		set vanterior = vidproveedor;
	END LOOP get_cursor;
	CLOSE cur_requi;

	-- Se actualiza el Status de la Requisición
	update requisicion set
		idestatus=14,	-- Orden Compra
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisicion=pidrequisicion;
	
	commit;
end$$

DELIMITER ;
