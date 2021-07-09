	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoresguardo_ins $$

CREATE PROCEDURE sp_vehiculoresguardo_ins
(IN pidvehiculo           smallint,
IN pplacas               varchar(8),
IN pfecharesguardo       datetime,
IN ptiporesguardo        char(1),
IN pidempleadoresguardo  int,
IN pidempleadosupervisor int,
IN pidregion             smallint,
IN pidadscripcion        smallint,
IN pidcliente            int,
IN pkilometrajeultimoservicio int,
IN pfechaultimoservicio  datetime,
IN pkilometrajeactual    int,
IN pkilometrajeproximoservicio int,
IN pobservaciones        varchar(1000),
IN pquien                varchar(15),
 OUT last_id INT)  

begin

	insert into vehiculoresguardo(idvehiculo,placas,fecharesguardo,tiporesguardo,idempleadoresguardo,idempleadosupervisor,
					idregion,idadscripcion,idcliente,kilometrajeultimoservicio,fechaultimoservicio,kilometrajeactual,
					kilometrajeproximoservicio,observaciones,quien,cuando)
	values(pidvehiculo,pplacas,pfecharesguardo,ptiporesguardo,pidempleadoresguardo,pidempleadosupervisor,
					pidregion,pidadscripcion,pidcliente,pkilometrajeultimoservicio,pfechaultimoservicio,pkilometrajeactual,
					pkilometrajeproximoservicio,pobservaciones,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				

	commit;
end$$

DELIMITER ;
