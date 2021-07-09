DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenserviciopuesto_all $$

CREATE PROCEDURE sp_ordenserviciopuesto_all(IN pidordenservicio int)

begin
	select 	idordenserviciopuesto,idordenservicio,osp.idpuesto,p.descpuesto,cantidad
   	from ordenserviciopuesto osp
       inner join puesto p on p.idpuesto=osp.idpuesto
	where idordenservicio=pidordenservicio;

end$$

DELIMITER ;