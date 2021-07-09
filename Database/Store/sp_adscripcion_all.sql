DELIMITER $$

DROP PROCEDURE IF EXISTS sp_adscripcion_all $$

CREATE PROCEDURE sp_adscripcion_all()  
begin
	select 	a.idadscripcion, a.descadscripcion, ifnull(r.descregion,'') as region,
			ifnull(a.fechainicio,'') as fechainicio, ifnull(a.fechabaja,'') as fechabaja, 
			ifnull(a.ciudad,'') as ciudad, 
			ifnull(m.descmunicipio,'') as municipio, ifnull(e.descestado,'') as estado
	from adscripcion a
		inner join region r on r.idregion=a.idregion
		left outer join estado e on e.idestado=a.idestado
		left outer join municipio m on m.idestado=a.idestado and m.idmunicipio=a.idmunicipio
	order by a.idregion, a.descadscripcion;
end$$

DELIMITER ;
