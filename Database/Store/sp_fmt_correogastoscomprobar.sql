DELIMITER $$

DROP PROCEDURE IF EXISTS sp_fmt_correogastoscomprobar $$

CREATE PROCEDURE sp_fmt_correogastoscomprobar(IN pidgastoscomprobar INT)
begin
	declare vformatolegal			text;
	declare vempleadobeneficiario	varchar(100);
	declare vfolio varchar(12);
	declare vempleadosolicita varchar(100);
	declare vobservaciones 	varchar(1500);
	declare vfechaentrega	varchar(100);
	declare vfechalimite	varchar(100);
	declare vreferenciaentrega	varchar(50);

	select 	concat_ws(' ', eb.nombre, ifnull(eb.apellidopaterno,''), ifnull(eb.apellidomaterno,'')) as empleado_beneficiario,
			gc.folio,
			concat_ws(' ', es.nombre, ifnull(es.apellidopaterno,''), ifnull(es.apellidomaterno,'')) as empleado_solicita,
			ifnull(gc.observaciones,'') as observaciones,
			fn_fechaletra(gc.fechaentrega) as fecha_entrega,
			fn_fechaletra(gc.fechalimitecomprobacion) as fecha_limite,
			ifnull(gc.referenciaentrega,'') as referencia_entrega
	into vempleadobeneficiario, vfolio, vempleadosolicita, vobservaciones, vfechaentrega, vfechalimite, vreferenciaentrega
	from gastoscomprobar gc
		inner join empleado es on es.idempleado=gc.idempleadosolicita
		inner join empleado eb on eb.idempleado=gc.idempleadobeneficiario
	where gc.idgastoscomprobar=pidgastoscomprobar;

	select contenido into vformatolegal
	from formatolegal
	where claveformato='03'
	limit 1;

	set vformatolegal = replace(vformatolegal, '{EMPLEADO_BENEFICIARIO}', vempleadobeneficiario);
	set vformatolegal = replace(vformatolegal, '{FOLIO}', vfolio);
	set vformatolegal = replace(vformatolegal, '{EMPLEADO_SOLICITA}', vempleadosolicita);
	set vformatolegal = replace(vformatolegal, '{OBSERVACIONES}', vobservaciones);
	set vformatolegal = replace(vformatolegal, '{FECHA_ENTREGA}', vfechaentrega);
	set vformatolegal = replace(vformatolegal, '{FECHA_LIMITE}', vfechalimite);
	set vformatolegal = replace(vformatolegal, '{REFERENCIA_ENTREGA}', vreferenciaentrega);

	select vformatolegal as formatolegal, vempleadosolicita as nombrecompleto;

end$$
DELIMITER ;