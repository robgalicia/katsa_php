DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobarfactura_ins $$

CREATE PROCEDURE sp_gastoscomprobarfactura_ins
(IN pidgastoscomprobardetalle int,
IN ptipocomprobante      char(1),	-- F - Factura, N - No Factura
IN pfoliocomprobante     varchar(15),
IN pfecha                datetime,
IN pproveedor            varchar(100),
IN prfcproveedor         varchar(13),
IN puuid                 varchar(40),
IN pnombrearchivoxml     varchar(100),
IN pnombrearchivopdf     varchar(100),
IN pobservaciones        varchar(100),
IN pimportetotal         decimal(12,2),
IN pquien           varchar(15),
 OUT last_id INT)  

begin
	declare vidgastoscomprobar int;
	
	select idgastoscomprobar into vidgastoscomprobar
	from gastoscomprobardetalle
	where idgastoscomprobardetalle = pidgastoscomprobardetalle;

	insert into gastoscomprobarfactura(idgastoscomprobardetalle,tipocomprobante,foliocomprobante,fecha,proveedor,rfcproveedor,
					uuid,nombrearchivoxml,nombrearchivopdf,observaciones,importetotal,quien,cuando)
	values(pidgastoscomprobardetalle,ptipocomprobante,pfoliocomprobante,pfecha,pproveedor,prfcproveedor,
					puuid,pnombrearchivoxml,pnombrearchivopdf,pobservaciones,pimportetotal,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();
	
	update gastoscomprobar set 
		idestatus=20,	-- ENTREGADO
		importecomprobado=(select sum(fac.importetotal) 
							from gastoscomprobardetalle det inner join gastoscomprobarfactura fac on fac.idgastoscomprobardetalle=det.idgastoscomprobardetalle
							where det.idgastoscomprobar=vidgastoscomprobar)
	where idgastoscomprobar=vidgastoscomprobar;	
	
	commit;
end$$

DELIMITER ;

