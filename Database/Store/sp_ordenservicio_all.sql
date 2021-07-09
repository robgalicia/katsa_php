DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenservicio_all $$

CREATE PROCEDURE sp_ordenservicio_all
(IN pfechainicial date, 
IN pfechafinal date,
IN pidestatus smallint,
IN pfolio varchar(12)) 
begin
	select os.idordenservicio, os.folio, os.fechainicio, r.descregion, c.nombre as nombrecliente, s.descripcioncorta as servicio,
            os.lugarservicio, st.descestatus
	from ordenservicio os
        inner join region r on r.idregion=os.idregion
        inner join cliente c on c.idcliente=os.idcliente
        inner join servicio s on s.idservicio=os.idservicio
		inner join estatus st on st.idestatus=os.idestatus
	where (convert(os.fechainicio,date) between pfechainicial and pfechafinal and os.idestatus=pidestatus)
	or os.folio=pfolio
	order by os.fechainicio;
end$$

DELIMITER ;
