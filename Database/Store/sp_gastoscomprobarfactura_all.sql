DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobarfactura_all $$

CREATE PROCEDURE sp_gastoscomprobarfactura_all(IN pidgastoscomprobar int)

begin
	
	select gcf.idgastoscomprobarfactura,
			case gcf.tipocomprobante when 'F' then 'FACTURA' else 'NO FACTURA' end as tipocomprobante,
			ifnull(gcf.uuid,gcf.foliocomprobante) as foliocomprobante, gcf.fecha,
			ifnull(gcf.proveedor,'') as proveedor, gcf.importetotal,
			ifnull(gcf.nombrearchivoxml,'') as nombrearchivoxml,
			ifnull(gcf.nombrearchivopdf,'') as nombrearchivopdf,
			p.descpartida
	from gastoscomprobarfactura gcf
		inner join gastoscomprobardetalle gcd on gcd.idgastoscomprobardetalle=gcf.idgastoscomprobardetalle
		inner join partida p on p.idpartida=gcd.idpartida
	where gcd.idgastoscomprobar = pidgastoscomprobar
	order by gcf.fecha, gcf.tipocomprobante;

end$$

DELIMITER ;

