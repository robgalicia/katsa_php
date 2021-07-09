DELIMITER $$

DROP PROCEDURE IF EXISTS sp_fmt_contrato $$

CREATE PROCEDURE sp_fmt_contrato(IN pidempleadocontrato INT)
begin
	declare vformatolegal			longtext;
	declare vnombreadministrador	varchar(100);
	declare vdomicilioempresa 		varchar(200);
	
	declare vnombreempleado			varchar(100);
	declare vnacionalidad			varchar(20);
	declare vsexo					varchar(10);
	declare vedad					varchar(10);
	declare vrfc					varchar(13);
	declare vnumimss				varchar(11);
	declare vcurp					varchar(18);
	declare vdomicilioempleado 		varchar(200);
	declare vdescpuesto				varchar(50);
	declare vdescmunicipio			varchar(50);
	declare vsalariodiario			decimal(10,2);
	declare vesquemapago			varchar(10);
	declare vcuentabanco			varchar(10);
	declare vclabe					varchar(18);
	declare vfechacontrato			datetime;
	declare vdiascontrato			smallint;
	declare vperiodocontrato		varchar(13);
	declare vestadocivil			varchar(30);
	declare vfechainicial			datetime;
	declare vfechafinal				datetime;
	declare vsueldomensual			decimal(10,2);
	declare vclaveformato			varchar(2);
	declare vfechaingreso			datetime;
	declare viddepartamento			smallint;

	select 	representantelegal, concat_ws(', ',calle, concat('NUMERO ',numeroext), colonia, ciudad, edo.descestado)
	into 	vnombreadministrador, vdomicilioempresa
	from oficinanegocio ofna
		inner join estado edo on edo.idestado=ofna.idestado
	where idoficinanegocio=1;

	select concat_ws(' ', e.nombre, ifnull(e.apellidopaterno,''), ifnull(e.apellidomaterno,'')) as nombre_empleado,
			ifnull(n.descnacionalidad,'SIN DATO') as nacionalidad,
			case e.sexo when 'M' then 'MASCULINO' else 'FEMENINO' end as sexo,
			if(e.fechanacimiento is null,'SIN DATO',fn_edad_anios(e.fechanacimiento)) as edad,
			ifnull(e.rfc,'SIN DATO') as rfc, ifnull(e.numimss,'SIN DATO') as numimss, ifnull(e.curp,'SIN DATO') as curp,
			concat(ifnull(e.calle,''),
				if(isnull(e.numexterior),'',concat_ws(' ',' NUM.',e.numexterior)),
				if(isnull(e.numinterior), '', 	concat_ws(' ',' INT.',e.numinterior)),
				if(isnull(e.entrecalles),'',concat_ws(' ',', ENTRE',e.entrecalles)),', ',
				ifnull(e.colonia,''),', ',
				if(isnull(e.codigopostal),'',concat_ws(' ','CODIGO POSTAL',e.codigopostal)),', ',
				ifnull(e.ciudad,''),', ',
				ifnull(edo.descestado,'')
			) as domicilio_empleado,
			ifnull(p.descpuesto,'SIN DATO') as descpuesto, m.descmunicipio, ec.salariodiariointegrado,
			case ec.esquemapago when 'Q' then 'QUINCENAL' else 'MENSUAL' end as esquemapago,
			ifnull(e.numcuenta,''), ifnull(e.clabe,''), ec.fechacontrato, ec.diascontrato,
			case ec.periodocontrato 
					when 'D' then 'DIAS' 
					when 'S' then 'SEMANAS' 
					when 'M' then 'MESES'
					when 'A' then 'AÑOS'
					when 'I' then 'INDETERMINADO' 
					else 'SIN DATO' end,
			ifnull(edoc.descestadocivil,'SIN DATO'), ec.fechainicial, ec.fechafinal, ifnull(ec.sueldonetomensual,0),
			ifnull(e.fechareingreso,e.fechaingreso) as fechaingreso, e.iddepartamento
	into 	vnombreempleado, vnacionalidad, vsexo, vedad, vrfc, vnumimss, vcurp, vdomicilioempleado, vdescpuesto, vdescmunicipio,
			vsalariodiario, vesquemapago, vcuentabanco, vclabe, vfechacontrato, vdiascontrato, vperiodocontrato,
			vestadocivil, vfechainicial, vfechafinal, vsueldomensual, vfechaingreso, viddepartamento
	from empleadocontrato ec
			inner join empleado e on e.idempleado=ec.idempleado
			left outer join nacionalidad n on n.idnacionalidad=e.idnacionalidad
			left outer join estado edo on edo.idestado=e.idestado
			left outer join puesto p on p.idpuesto=e.idpuestoorganigrama
			inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
			inner join municipio m on m.idestado=a.idestado and m.idmunicipio=a.idmunicipio
			left outer join estadocivil edoc on edoc.idestadocivil=e.idestadocivil
	where ec.idempleadocontrato=pidempleadocontrato;

	if vdiascontrato = 1 then
		set vperiodocontrato = 
		case vperiodocontrato
			WHEN 'DIAS' THEN 'DIA'
			WHEN 'SEMANAS' THEN 'SEMANA'
			WHEN 'MESES' THEN 'MES'
			WHEN 'AÑOS' THEN 'AÑO'
 		END;
	end if;

	if viddepartamento=2 then -- Operaciones
		set vclaveformato='02';
		if vperiodocontrato='INDETERMINADO' then
			set vclaveformato='06';
		end if;
	else -- Administrativos
		set vclaveformato='07';
		if vperiodocontrato='INDETERMINADO' then
			set vclaveformato='08';
		end if;
	end if;

	select contenido into vformatolegal
	from formatolegal
	where claveformato=vclaveformato
	limit 1;

	set vformatolegal = replace(vformatolegal, '{NOMBRE_ADMINISTRADOR}', vnombreadministrador);
	set vformatolegal = replace(vformatolegal, '{DOMICILIO_EMPRESA}', vdomicilioempresa);
	set vformatolegal = replace(vformatolegal, '{NOMBRE_EMPLEADO}', vnombreempleado);
	set vformatolegal = replace(vformatolegal, '{NACIONALIDAD}', vnacionalidad);
	set vformatolegal = replace(vformatolegal, '{SEXO}', vsexo);
	set vformatolegal = replace(vformatolegal, '{ESTADO_CIVIL}', vestadocivil);
	set vformatolegal = replace(vformatolegal, '{EDAD}', vedad);
	set vformatolegal = replace(vformatolegal, '{RFC}', vrfc);
	set vformatolegal = replace(vformatolegal, '{NUMIMSS}', vnumimss);
	set vformatolegal = replace(vformatolegal, '{CURP}', vcurp);
	set vformatolegal = replace(vformatolegal, '{DOMICILIO_EMPLEADO}', vdomicilioempleado);
	set vformatolegal = replace(vformatolegal, '{PUESTO_ORGANIGRAMA}', vdescpuesto);
	set vformatolegal = replace(vformatolegal, '{CIUDAD_REGION}', vdescmunicipio);
	set vformatolegal = replace(vformatolegal, '{SALARIO_DIARIO}', concat('$',format(vsalariodiario,2)));
	set vformatolegal = replace(vformatolegal, '{SUELDO_MENSUAL}', concat('$',format(vsueldomensual,2)));
	set vformatolegal = replace(vformatolegal, '{SUELDOMES_LETRA}', fn_importeletra(vsueldomensual));
	set vformatolegal = replace(vformatolegal, '{ESQUEMA_PAGO}', vesquemapago);
	set vformatolegal = replace(vformatolegal, '{CUENTA_BANCO}', vcuentabanco);
	set vformatolegal = replace(vformatolegal, '{CLABE}', vclabe);
	set vformatolegal = replace(vformatolegal, '{FECHA_CONTRATO}', lower(fn_fechaletra(vfechacontrato)));
	set vformatolegal = replace(vformatolegal, '{PERIODO_CONTRATO}', lower(concat(vdiascontrato,' ',vperiodocontrato)));
	set vformatolegal = replace(vformatolegal, '{FECHA_INICIAL}', lower(fn_fechaletra(vfechainicial)));
	set vformatolegal = replace(vformatolegal, '{FECHA_FINAL}', lower(fn_fechaletra(vfechafinal)));
	set vformatolegal = replace(vformatolegal, '{FECHA_INGRESO}', lower(fn_fechaletra(vfechaingreso)));


	select vformatolegal as formatolegal, vnombreempleado as nombrecompleto;

end$$
DELIMITER ;
