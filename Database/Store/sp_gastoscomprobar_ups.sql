DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_ups $$

CREATE PROCEDURE sp_gastoscomprobar_ups
(IN pidgastoscomprobar  int,
IN ptipogasto           char(1),
IN plugarviaje           varchar(200),
IN pidtipoviaje          smallint,
IN pmotivoviaje          varchar(200),
IN pdiasviaje            smallint,
IN pfechainicial         datetime,
IN pfechafinal           datetime,
IN pdistanciakms         int,
IN pidregion             smallint,
IN pidadscripcion        smallint,
IN piddepartamento       smallint,
IN pidcliente            int,
IN pidempleadosolicita   int,
IN pidempleadobeneficiario int,
IN pcorreoelectronico	varchar(50),
IN pobservaciones       varchar(1500),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

	declare vfolio varchar(12);
	declare videstatus smallint;

    set videstatus=15;	-- Solicitud

    if pidgastoscomprobar=0 then

        CALL sp_foliogastoscomprobar(@folio);
        set vfolio=@folio;

        insert into gastoscomprobar(
                    folio,fecha,tipogasto,lugarviaje,idtipoviaje,motivoviaje,diasviaje,fechainicial,fechafinal,
                    distanciakms,idregion,idadscripcion,iddepartamento,idcliente,idempleadosolicita,
                    idempleadobeneficiario,idestatus,importetotal,observaciones,quien,cuando)
        values(vfolio,fn_fecha_actual(),ptipogasto,plugarviaje,pidtipoviaje,pmotivoviaje,pdiasviaje,pfechainicial,pfechafinal,
                    pdistanciakms,pidregion,pidadscripcion,piddepartamento,pidcliente,pidempleadosolicita,
                    pidempleadobeneficiario,videstatus,0,pobservaciones,pquien,fn_fecha_actual());
            
        SET last_id = LAST_INSERT_ID();				
    else
        update gastoscomprobar set
            tipogasto=ptipogasto,
            lugarviaje=plugarviaje,
            idtipoviaje=idtipoviaje,
            motivoviaje=pmotivoviaje,
            diasviaje=pdiasviaje,
            fechainicial=pfechainicial,
            fechafinal=pfechafinal,
            distanciakms=pdistanciakms,
            idregion=pidregion,
            idadscripcion=pidadscripcion,
            iddepartamento=piddepartamento,
            idcliente=pidcliente,
            idempleadosolicita=pidempleadosolicita,
            idempleadobeneficiario=pidempleadobeneficiario,
            observaciones=pobservaciones,
            idestatus=videstatus,
            quien=pquien,
            cuando=fn_fecha_actual()
        where idgastoscomprobar=pidgastoscomprobar;
        
        SET last_id = pidgastoscomprobar;				
    end if;

	update empleado set correoelectronico=pcorreoelectronico
	where idempleado=pidempleadobeneficiario;
	
	commit;
end$$

DELIMITER ;

