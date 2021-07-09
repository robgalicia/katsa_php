DELIMITER $$

DROP PROCEDURE IF EXISTS sp_autorizasolicitud_ups $$

CREATE PROCEDURE sp_autorizasolicitud_ups
(IN pidautorizasolicitud  smallint,
IN ptiposolicitud		 char(1),
IN pidregion             smallint,
IN piddepartamento       smallint,
IN pidempleadorevisa     int,
IN pidempleadoautoriza   int,
IN pquien                varchar(15),
 OUT last_id INT)

begin
	if pidautorizasolicitud = 0 then	

		insert into autorizasolicitud(tiposolicitud,idregion,iddepartamento,idempleadorevisa,idempleadoautoriza,quien,cuando)
		values(ptiposolicitud,pidregion,piddepartamento,pidempleadorevisa,pidempleadoautoriza,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update autorizasolicitud SET
			tiposolicitud=ptiposolicitud,
            idregion=pidregion,
            iddepartamento=piddepartamento,
            idempleadorevisa=pidempleadorevisa,
            idempleadoautoriza=pidempleadoautoriza,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idautorizasolicitud = pidautorizasolicitud;

		SET last_id = pidautorizasolicitud;
	end if;

	commit;
end$$

DELIMITER ;
