DELIMITER $$

DROP PROCEDURE IF EXISTS sp_asistenciaingeniero_ups $$

CREATE PROCEDURE sp_asistenciaingeniero_ups
(IN pidasistenciaingeniero int,
IN pidregion             smallint,
IN pidadscripcion        smallint,
IN pidcliente            int,
IN pfecha                datetime,
IN pgrupo                tinyint,
IN ptipolista            char(1),
IN pidingeniero          int,
IN ptipovehiculo         char(1),
IN pnumeconomico         varchar(5),
IN pidempleadoregistra   int,
IN platitud         	 varchar(20),
IN plongitud         	 varchar(20),
IN pquien            	 varchar(15),
 OUT last_id INT)

begin
	if pidasistenciaingeniero = 0 then	

		insert into asistenciaingeniero(idregion,idadscripcion,idcliente,fecha,grupo,tipolista,
					idingeniero,tipovehiculo,numeconomico,idempleadoregistra,quien,cuando,
					latitud, longitud)
		values(pidregion,pidadscripcion,pidcliente,pfecha,pgrupo,ptipolista,pidingeniero,
					ptipovehiculo,pnumeconomico,pidempleadoregistra,pquien,fn_fecha_actual(),
					platitud, plongitud);

    	SET last_id = LAST_INSERT_ID();				
	else
		update asistenciaingeniero SET
			idregion=pidregion,
			idadscripcion=pidadscripcion,
			idcliente=pidcliente,
			fecha=pfecha,
			grupo=pgrupo,
			tipolista=ptipolista,
			idingeniero=pidingeniero,
			tipovehiculo=ptipovehiculo,
			numeconomico=pnumeconomico,
			idempleadoregistra=pidempleadoregistra,
			quien=pquien,
			cuando=fn_fecha_actual(),
			latitud=platitud,
			longitud=plongitud
		where idasistenciaingeniero = pidasistenciaingeniero;

		SET last_id = pidasistenciaingeniero;
	end if;

	commit;
end$$

DELIMITER ;

