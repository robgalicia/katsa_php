DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculo_ups $$

CREATE PROCEDURE sp_vehiculo_ups
(IN pidvehiculo           smallint,
IN pidmarcavehiculo      smallint,
IN psubmarca             varchar(50),
IN paniomodelo           smallint,
IN pplacas               varchar(8),
IN pidcolor              smallint,
IN pcilindros            smallint,
IN pnumserie             varchar(20),
IN pnummotor             varchar(10),
IN ptipotransmision      char(3),
IN pidtipocombustible    smallint,
IN pcapacidadtanque      smallint,
IN pnumeconomico         smallint,
IN ptarjetacombustible   int,
IN pesarrendado          char(1),
IN pidarrendadora        smallint,
IN pobservaciones        varchar(100),
IN ptienegps          	 char(1),
IN pproveedorgps         varchar(50),
IN pfechabaja			 datetime,
IN pmotivobaja			 varchar(100),	
IN pquien                varchar(15),
 OUT last_id INT)

begin
	declare videstatus smallint;
	set videstatus=6;	-- Activo

	if pidvehiculo = 0 then	

		insert into vehiculo(idmarcavehiculo,submarca,aniomodelo,placas,idcolor,cilindros,numserie,nummotor,
							tipotransmision,idtipocombustible,capacidadtanque,numeconomico,tarjetacombustible,
							esarrendado,idarrendadora,idestatus,observaciones,quien,cuando,
							tienegps,proveedorgps)
		values(pidmarcavehiculo,psubmarca,paniomodelo,pplacas,pidcolor,pcilindros,pnumserie,pnummotor,
				ptipotransmision,pidtipocombustible,pcapacidadtanque,pnumeconomico,ptarjetacombustible,
				pesarrendado,pidarrendadora,videstatus,pobservaciones,pquien,fn_fecha_actual(),
				ptienegps,pproveedorgps);

    	SET last_id = LAST_INSERT_ID();				
	else
		if isnull(pfechabaja)=0 then
			set videstatus=7;	-- Baja
		end if;

		update vehiculo SET
			idmarcavehiculo=pidmarcavehiculo,
			submarca=psubmarca,
			aniomodelo=paniomodelo,
			placas=pplacas,
			idcolor=pidcolor,
			cilindros=pcilindros,
			numserie=pnumserie,
			nummotor=pnummotor,
			tipotransmision=ptipotransmision,
			idtipocombustible=pidtipocombustible,
			capacidadtanque=pcapacidadtanque,
			numeconomico=pnumeconomico,
			tarjetacombustible=ptarjetacombustible,
			esarrendado=pesarrendado,
			idarrendadora=pidarrendadora,
			observaciones=pobservaciones,
			quien=pquien,
			cuando=fn_fecha_actual(),
			tienegps=ptienegps,
			proveedorgps=pproveedorgps,
			fechabaja=pfechabaja,
			motivobaja=pmotivobaja,
			idestatus=videstatus
		where idvehiculo = pidvehiculo;

		SET last_id = pidvehiculo;
	end if;

	commit;
end$$

DELIMITER ;
