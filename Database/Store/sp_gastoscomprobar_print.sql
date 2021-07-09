DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_print $$

CREATE PROCEDURE sp_gastoscomprobar_print(IN pidgastoscomprobar int)
begin
	select 	es.nombrecompleto as empleadosolicita, ifnull(er.nombrecompleto,'') as empleadosupervisor, 
			eb.nombrecompleto as empleadobeneficiario, d.descdepartamento,
			ifnull(c.nombre,'') as nombrecliente, gc.folio, st.descestatus, gc.fecha as fechasolicitud,
			ifnull(gc.fecharevision,'') as fecharevision, ifnull(gc.fechaautorizacion,'') as fechaautorizacion,
			ifnull(gc.observaciones,'') as observaciones,
			ifnull(gc.lugarviaje,'') as lugarviaje,
			gc.idtipoviaje, tv.desctipoviaje,
			ifnull(gc.motivoviaje,'') as motivoviaje,
			gc.diasviaje, gc.fechainicial, gc.fechafinal, gc.distanciakms,
			p.descpartida, gcd.importe, ifnull(gcd.cantidad,1) as cantidad,
			gcd.total as totalpartida, ifnull(gcd.justificacion,'') as justificacion,
			ifnull(gcd.cantidadautoriza,1) as cantidadautoriza, gcd.importeautoriza, gcd.totalautoriza
	from gastoscomprobar gc	
		inner join gastoscomprobardetalle gcd on gcd.idgastoscomprobar=gc.idgastoscomprobar
		inner join partida p on p.idpartida=gcd.idpartida
		inner join empleado es on es.idempleado=gc.idempleadosolicita
		left outer join empleado er on er.idempleado=gc.idempleadorevisa
		inner join empleado eb on eb.idempleado=gc.idempleadobeneficiario
		inner join departamento d on d.iddepartamento=gc.iddepartamento
		left outer join cliente c on c.idcliente=gc.idcliente
		inner join estatus st on st.idestatus=gc.idestatus
		inner join tipoviaje tv on tv.idtipoviaje=gc.idtipoviaje
	where gc.idgastoscomprobar=pidgastoscomprobar
	order by p.descpartida;
end$$

DELIMITER ;
