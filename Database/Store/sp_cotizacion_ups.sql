DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizacion_ups $$

CREATE PROCEDURE sp_cotizacion_ups
(IN pidcotizacion        int,
IN pfecha                datetime,
IN plugarexpedicion      varchar(50),
IN pasunto               varchar(100),
IN pidcliente            int,
IN ppersonacontacto      varchar(100),
IN ppersonacopia         varchar(100),
IN ptiposervicio         varchar(100),
IN plugarservicio        varchar(100),
IN pubicacionlugar       varchar(100),
IN pidempleadoelabora    int,
IN pidempleadofirma      int,
IN pidtipomoneda         smallint,
IN pfechainicio          datetime,
IN pfechafinal           datetime,
IN pquien                varchar(15),
 OUT last_id INT)  

begin

	declare vfolio varchar(12);
	
	if pidcotizacion = 0 then	
        CALL sp_foliocotizacion(@folio);
        set vfolio=@folio;

		insert into cotizacion(fecha,folio,lugarexpedicion,asunto,idcliente,personacontacto,
                        personacopia,tiposervicio,lugarservicio,ubicacionlugar,idempleadoelabora,
                        idempleadofirma,idtipomoneda,fechainicio,fechafinal,quien,cuando)
		values(pfecha,vfolio,plugarexpedicion,pasunto,pidcliente,ppersonacontacto,
              ppersonacopia,ptiposervicio,plugarservicio,pubicacionlugar,pidempleadoelabora,
              pidempleadofirma,pidtipomoneda,pfechainicio,pfechafinal,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update cotizacion SET
			fecha=pfecha,
            lugarexpedicion=plugarexpedicion,
            asunto=pasunto,
            idcliente=pidcliente,
            personacontacto=ppersonacontacto,
            personacopia=ppersonacopia,
            tiposervicio=ptiposervicio,
            lugarservicio=plugarservicio,
            ubicacionlugar=pubicacionlugar,
            idempleadoelabora=pidempleadoelabora,
            idempleadofirma=pidempleadofirma,
            idtipomoneda=pidtipomoneda,
            fechainicio=pfechainicio,
            fechafinal=pfechafinal,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idcotizacion = pidcotizacion;

		SET last_id = pidcotizacion;
	end if;

	commit;
end$$

DELIMITER ;

