DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_sel $$

CREATE PROCEDURE sp_gastoscomprobar_sel(IN pidgastoscomprobar int) 
begin

	select 	gc.idgastoscomprobar, gc.tipogasto, gc.folio, gc.fecha, ifnull(gc.fecharevision,'') as fecharevision, 
			ifnull(gc.fechaautorizacion,'') as fechaautorizacion, ifnull(gc.fechacancelacion,'') as fechacancelacion, 
			gc.importetotal, gc.idestatus, st.descestatus,
			gc.idempleadosolicita, e.nombrecompleto as empleadosolicita,
			gc.idempleadobeneficiario, eb.nombrecompleto as empleadobeneficiario,
			ifnull(eb.correoelectronico,'') as correobeneficiario,
			gc.idregion, r.descregion,
			gc.iddepartamento, d.descdepartamento,
			gc.centrocostos,
			ifnull(gc.idempleadorevisa,0) as idempleadorevisa, ifnull(er.nombrecompleto,'') as empleadorevisa,
			ifnull(gc.idempleadoautoriza,0) as idempleadoautoriza, ifnull(ea.nombrecompleto,'') as empleadoautoriza,
			ifnull(gc.observaciones,'') as observaciones,
			ifnull(gc.fechaentrega,'') as fechaentrega,
			ifnull(gc.referenciaentrega,'') as referenciaentrega,
			ifnull(gc.fechalimitecomprobacion,'') as fechalimitecomprobacion,
			ifnull(gc.fechacomprobacion,'') as fechacomprobacion,
			ifnull(gc.importecomprobado,0) as importecomprobado,
			ifnull(gc.idcuentabancaria,0) as idcuentabancaria, ifnull(cb.numerocuenta,'') as numerocuenta,
			ifnull(gc.comentariosconciliacion,0) as comentariosconciliacion,
			ifnull(gc.idcliente,0) as idcliente, ifnull(c.nombre,'') as nombrecliente,
			gcd.idgastoscomprobardetalle, gcd.idpartida, p.descpartida, 
			ifnull(gcd.cantidad,1) as cantidad, gcd.importe, gcd.total as totalpartida, ifnull(gcd.justificacion,'') as justificacion,
			ifnull(gcd.cantidadautoriza,1) as cantidadautoriza, gcd.importeautoriza, gcd.totalautoriza,
			ifnull(gc.lugarviaje,'') as lugarviaje,	gc.idtipoviaje, tv.desctipoviaje,
			ifnull(gc.motivoviaje,'') as motivoviaje, gc.diasviaje, gc.fechainicial, gc.fechafinal, gc.distanciakms,
			ifnull(gc.idadscripcion,0) as idadscripcion, ifnull(ads.descadscripcion,'') as descadscripcion,
			ifnull(gc.observacionesrevision,'') as observacionesrevision,
			ifnull(gc.fechavalidacion,'') as fechavalidacion,
			ifnull(gc.idempleadovalidacion,0) as idempleadovalidacion, ifnull(ev.nombrecompleto,'') as empleadovalidacion
	from gastoscomprobar gc
		inner join estatus st on st.idestatus=gc.idestatus
		inner join empleado e on e.idempleado=gc.idempleadosolicita
		inner join empleado eb on eb.idempleado=gc.idempleadobeneficiario
		inner join region r on r.idregion=gc.idregion
		inner join departamento d on d.iddepartamento=gc.iddepartamento
		left outer join empleado er on er.idempleado=gc.idempleadorevisa
		left outer join empleado ea on ea.idempleado=gc.idempleadoautoriza
		left outer join cuentabancaria cb on cb.idcuentabancaria=gc.idcuentabancaria
		left outer join cliente c on c.idcliente=gc.idcliente
		inner join gastoscomprobardetalle gcd on gcd.idgastoscomprobar=gc.idgastoscomprobar
		inner join partida p on p.idpartida=gcd.idpartida
		inner join tipoviaje tv on tv.idtipoviaje=gc.idtipoviaje
		left outer join adscripcion ads on ads.idadscripcion=gc.idadscripcion
		left outer join empleado ev on ev.idempleado=gc.idempleadovalidacion
	where gc.idgastoscomprobar=pidgastoscomprobar;
end$$

DELIMITER ;
