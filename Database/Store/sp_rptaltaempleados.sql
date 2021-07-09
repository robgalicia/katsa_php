DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptaltaempleados $$

CREATE PROCEDURE sp_rptaltaempleados(IN pfechainicio date, IN pfechafinal date)  
begin
	declare vregistropatronal varchar(15);

	select ifnull(registropatronal,'') into vregistropatronal
	from oficinanegocio
	where idoficinanegocio = 1;

	select 	lpad(e.numempleado,5,'0') as Codigo, DATE_FORMAT(e.fechaingreso,'%d/%m/%Y') as Fechadealta, '30/12/1899' as Fechadebaja,
			ifnull(DATE_FORMAT(e.fechareingreso,'%d/%m/%Y'),'30/12/1899') as Fechadereingreso, "01" as Tipodecontrato,
			ifnull(e.apellidopaterno,'') as Apellidopaterno, ifnull(e.apellidomaterno,'') as Apellidomaterno, ifnull(e.nombre,'') as Nombre,
			'Quincenal' as Tipodeperiodo, round(e.sueldodiarioimss,2) as Salariodiario, round((e.sueldodiarioimss * 1.0452),2) as SBCpartefija,
			'F' as Basedecotización, 'A' as Estatusempleado, d.descdepartamento as Departamento, 'C' as Sindicalizado, 'S' as Basedepago,
			'03' as Metododepago, 'Matutino' as Turnodetrabajo, 'A' as Zonadesalario, '' as Campoextra1, '' as Campoextra2, '' as Campoextra3,
			'' as Afore, '' as Expediente, e.numimss as Numseguridadsocial, e.rfc, e.curp, e.sexo, e.lugarnacimiento as Ciudaddenacimiento,
			ifnull(DATE_FORMAT(e.fechanacimiento,'%d/%m/%Y'),'30/12/1899') as Fechadenacimiento, '0' as UMF, '' as Nombredelpadre,
			'' as Nombredelamadre,
			concat(ifnull(e.calle,''),
					if(isnull(e.numexterior),'',concat_ws(' ',' NUM.',e.numexterior)),
					if(isnull(e.numinterior), '', 	concat_ws(' ',' INT.',e.numinterior)),
					if(isnull(e.entrecalles),'',concat_ws(' ',', ENTRE',e.entrecalles)),', ',
					ifnull(e.colonia,''),', ',
					if(isnull(e.codigopostal),'',concat_ws(' ','CODIGO POSTAL',e.codigopostal))) as Direccion,
			ifnull(p.descpuesto,'') as Puesto, ifnull(e.ciudad,'') as Poblacion, ifnull(edo.abreviacion,'TAM') as Entidadfederativadeldomicilio,
			ifnull(convert(e.codigopostal,char(6)),'') as Cp, ifnull(substring(ec.descestadocivil,1,1),'S') as Estadocivil,
			ifnull(e.telefonocelular,'') as Telefono, 0 as Avisopendientemodificacionsbc, 0 as Avisopendientereingresoimss,
			0 as Avisopendientebajaimss, 0 as Avisopendientecambiobasecotiza, 
			ifnull(DATE_FORMAT(e.fechareingreso,'%d/%m/%Y'),DATE_FORMAT(e.fechaingreso,'%d/%m/%Y')) as Fechadelsalariodiario,
			ifnull(DATE_FORMAT(e.fechareingreso,'%d/%m/%Y'),DATE_FORMAT(e.fechaingreso,'%d/%m/%Y')) as Fechasbcpartefija,
			0 as Salariovariable, '30/12/1899' as Fechasalariovariable, 0 as Salariopromedio, '30/12/1899' as Fechasalariopromedio, 
			0 as Salariobaseliquidacion, 0 as Saldodelajustealneto, 1 as Calculoptu, 1 as Calculoaguinaldo,
			'' as Bancoparapagoelectronico, '' as Numerodecuentaparapagoelectronico, '' as Sucursalparapagoelectronico,
			'' as Causadelaultimabaja, '0' as Campoextranumerico1, '0' as Campoextranumerico2, '0' as Campoextranumerico3,
			'0' as Campoextranumerico4, '0' as Campoextranumerico5, '30/12/1899' as Fechasalariomixto, '0' as Salariomixto,
			vregistropatronal as Registropatronaldelimss, '' as Numerofonacot, ifnull(e.correoelectronico,'') as Correoelectronico,
			'03' as Tipoderegimen, ifnull(e.clabe,'') as Clabeinterbancaria, edo.codigo as Entidadfederativadenacimiento, 
			'Confianza' as Tipodeprestacion, 0 as Extranjerosincurp
	from empleado e
		inner join departamento d on d.iddepartamento=e.iddepartamento
		left outer join puesto p on p.idpuesto=e.idpuestoorganigrama
		left outer join estado edo on edo.idestado=e.idestado
		left outer join estadocivil ec on ec.idestadocivil=e.idestadocivil
	where convert(ifnull(e.fechareingreso,e.fechaingreso),date) between pfechainicio and pfechafinal
	and e.fechabaja is null;
end$$

DELIMITER ;
