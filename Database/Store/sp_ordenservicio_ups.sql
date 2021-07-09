DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenservicio_ups $$

CREATE PROCEDURE sp_ordenservicio_ups
(IN pidordenservicio     int,
IN pnumeroacta           int,
IN pfechainicio          datetime,
IN pidregion             smallint,
IN pidcotizacion         int,
IN pidcliente            int,
IN pfolioordencompra     varchar(10),
IN pfechaordencompra     datetime,
IN pidservicio           int,
IN plugarservicio        varchar(100),
IN pnumelementos         smallint,
IN ptipoturno            varchar(5),
IN prechabvehiculo       char(1),
IN prechabvehiculotipo   char(2),
IN prechabequipocom      char(1),
IN prechabequipocomtipo  char(1),
IN prechabgps            char(1),
IN prechabgpstipo        char(1),
IN prechabcasetavig      char(1),
IN prechabcasetavigtipo  char(1),
IN prechabgenelectrico   char(1),
IN prechabgenelectricotipo char(1),
IN prechabmediorest      char(1),
IN prechabmedioresttipo  char(1),
IN pobservaciones        varchar(200),
IN pquien            varchar(15),
 OUT last_id INT)

begin
    declare vfolio varchar(12);
    declare videstatus smallint;

	if pidordenservicio = 0 then
        set videstatus=35;  -- ACTIVO	
        CALL sp_folioordenservicio(@folio);
        set vfolio=@folio;

        insert into ordenservicio(folio,numeroacta,fechainicio,idregion,idcotizacion,idcliente,folioordencompra,
                        fechaordencompra,idservicio,lugarservicio,numelementos,tipoturno,rechabvehiculo,
                        rechabvehiculotipo,rechabequipocom,rechabequipocomtipo,rechabgps,rechabgpstipo,
                        rechabcasetavig,rechabcasetavigtipo,rechabgenelectrico,rechabgenelectricotipo,
                        rechabmediorest,rechabmedioresttipo,idestatus,observaciones,quien,cuando)
        values (vfolio, pnumeroacta,pfechainicio,pidregion,pidcotizacion,pidcliente,pfolioordencompra,
                        pfechaordencompra,pidservicio,plugarservicio,pnumelementos,ptipoturno,prechabvehiculo,
                        prechabvehiculotipo,prechabequipocom,prechabequipocomtipo,prechabgps,prechabgpstipo,
                        prechabcasetavig,prechabcasetavigtipo,prechabgenelectrico,prechabgenelectricotipo,
                        prechabmediorest,prechabmedioresttipo,videstatus,pobservaciones,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();

        -- Por medio de un trigger de insert (tgra_ordenservicio_ins) se registra el acta de servicio inicial		
	else
		update ordenservicio SET
            numeroacta=pnumeroacta,
            fechainicio=pfechainicio,
            idregion=pidregion,
            idcotizacion=pidcotizacion,
            idcliente=pidcliente,
            folioordencompra=pfolioordencompra,
            fechaordencompra=pfechaordencompra,
            idservicio=pidservicio,
            lugarservicio=plugarservicio,
            numelementos=pnumelementos,
            tipoturno=ptipoturno,
            rechabvehiculo=prechabvehiculo,
            rechabvehiculotipo=prechabvehiculotipo,
            rechabequipocom=prechabequipocom,
            rechabequipocomtipo=prechabequipocomtipo,
            rechabgps=prechabgps,
            rechabgpstipo=prechabgpstipo,
            rechabcasetavig=prechabcasetavig,
            rechabcasetavigtipo=prechabcasetavigtipo,
            rechabgenelectrico=prechabgenelectrico,
            rechabgenelectricotipo=prechabgenelectricotipo,
            rechabmediorest=prechabmediorest,
            rechabmedioresttipo=prechabmedioresttipo,
            observaciones=pobservaciones,
            quien=pquien,
            cuando=fn_fecha_actual()
		where idordenservicio = pidordenservicio;

		SET last_id = pidordenservicio;
	end if;

	commit;
end$$

DELIMITER ;