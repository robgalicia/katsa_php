DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_edofuerza $$

CREATE PROCEDURE sp_empleado_edofuerza(IN pidestatus smallint)  
begin
	select 	e.idempleado, st.descestatus, 
			case e.outsourcing when 'S' then (select eo.nombrecorto from empresaoutsourcing eo where eo.idempresaoutsourcing=e.idempresaoutsourcing)
			else '' end as empresa,
			edo.descestado as entidad, mpio.descmunicipio as municipio,
			c.nombre as nombrecliente, a.descadscripcion, 
			'2021-12-31' as conclusionservicio,
			e.nombrecompleto as nombreempleado, e.sueldonetomensual, 
			pt.descpuesto as puestotabulador,
			po.descpuesto as puestoorganigrama, ifnull(po.descfunciones,'') as funcionespuesto,
			pr.descpuesto as puestoregistro,
			case e.requiereregsnsp when 'S' then 'SI' else 'NO' end as requiereregsnsp,
			sr.descestatus as estatusregsnsp,
			case e.capbasica when 'S' then 'SI' else 'NO' end as capbasica,
			case e.capseginmuebles when 'S' then 'SI' else 'NO' end as capseginmuebles,
			case e.capmanejodefensivo when 'S' then 'SI' else 'NO' end as capmanejodefensivo,
			case e.capprimerosauxilios when 'S' then 'SI' else 'NO' end as capprimerosauxilios,
			ifnull(e.cuip,'') as cuip, ifnull(e.curp,'') as curp, ifnull(e.rfc,'') as rfc, ifnull(e.numimss,'') as numimss, 
			ts.desctiposangre as gruposanguineo,
			ifnull(e.fechareingreso, e.fechaingreso) as fechaalta,
			ifnull(e.fechabaja,'') as fechabaja,
			case (select count(*) from vehiculo v where v.idempleadoresguardo=e.idempleado) when 0 then 'NO' else 'SI' end as vehiculoasignado,
			'NISSAN NP300' as marcasubmarca,
			'AB6858X' as placas,
			'X' as gasolina,
			'' as diesel,
			0 as consumomes,
			'RENTA KATSA' as modalidadasigna,
			'Excellence' as propietarioveh			
	from empleado e
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
		inner join estado edo on edo.idestado=a.idestado
		inner join municipio mpio on mpio.idestado=a.idestado and mpio.idmunicipio=a.idmunicipio
		inner join cliente c on c.idcliente=e.idclienteactual
		inner join estatus st on st.idestatus=e.idestatus
		inner join puesto pt on pt.idpuesto=e.idpuestotabulador
		inner join puesto po on po.idpuesto=e.idpuestoorganigrama
		inner join puesto pr on pr.idpuesto=e.idpuestoregistro
		inner join estatus sr on sr.idestatus=e.idestatusregsnsp
		inner join tiposangre ts on ts.idtiposangre=e.idtiposangre
	where e.idestatus=pidestatus;
end$$

DELIMITER ;
