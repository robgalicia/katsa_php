DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenservicio_sel $$

CREATE PROCEDURE sp_ordenservicio_sel(IN pidordenservicio int)

begin
	select 	idordenservicio,folio,numeroacta,fechainicio,idregion,idcotizacion,idcliente,folioordencompra,
            fechaordencompra,idservicio,lugarservicio,numelementos,tipoturno,rechabvehiculo,rechabvehiculotipo,
            rechabequipocom,rechabequipocomtipo,rechabgps,rechabgpstipo,rechabcasetavig,rechabcasetavigtipo,
            rechabgenelectrico,rechabgenelectricotipo,rechabmediorest,rechabmedioresttipo,fechaterminacion,
            observaciones
   	from ordenservicio
	where idordenservicio=pidordenservicio;

end$$

DELIMITER ;