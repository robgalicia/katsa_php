DELIMITER $$

DROP PROCEDURE IF EXISTS sp_fmt_cambioadscripcion $$

CREATE PROCEDURE sp_fmt_cambioadscripcion(IN pidempleadoadscripcion INT)
begin
	declare vformatolegal			text;
	declare vnombreempleado			varchar(100);
	declare vfechaletra				varchar(500);
	declare vnombreobra				varchar(250);
	declare vubicacionobra 			varchar(100);
	declare vnombreadministrador	varchar(100);

	select concat_ws(' ', e.nombre, ifnull(e.apellidopaterno,''), ifnull(e.apellidomaterno,'')) as nombre_empleado,
			fn_fechaletra_largo(ea.fechaadscripcion) as fecha_letra,
			concat(c.nombre,'/',a.descadscripcion) as nombre_obra,
			concat(m.descmunicipio,', ', es.descestado) as ubicacion_obra
	into vnombreempleado, vfechaletra, vnombreobra, vubicacionobra
	from empleadoadscripcion ea
		inner join empleado e on e.idempleado=ea.idempleado
		inner join adscripcion a on a.idadscripcion=ea.idadscripcion
		inner join cliente c on c.idcliente=ea.idcliente
		inner join estado es on es.idestado=a.idestado
		inner join municipio m on m.idestado=a.idestado and m.idmunicipio=a.idmunicipio
	where ea.idempleadoadscripcion=pidempleadoadscripcion;

	select representantelegal into vnombreadministrador
	from oficinanegocio
	where idoficinanegocio=1;

	select contenido into vformatolegal
	from formatolegal
	where claveformato='01'
	limit 1;

	set vformatolegal = replace(vformatolegal, '{NOMBRE_EMPLEADO}', vnombreempleado);
	set vformatolegal = replace(vformatolegal, '{FECHA_LETRA}', vfechaletra);
	set vformatolegal = replace(vformatolegal, '{NOMBRE_OBRA}', vnombreobra);
	set vformatolegal = replace(vformatolegal, '{UBICACION_OBRA}', vubicacionobra);
	set vformatolegal = replace(vformatolegal, '{NOMBRE_ADMINISTRADOR}', vnombreadministrador);

	select vformatolegal as formatolegal, vnombreempleado as nombrecompleto;

end$$
DELIMITER ;