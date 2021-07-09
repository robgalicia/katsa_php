DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_ins $$

CREATE PROCEDURE sp_gastoscomprobar_ins
(IN ptipogasto           char(1),
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
	
	CALL sp_foliogastoscomprobar(@folio);
	set vfolio=@folio;

	set videstatus=15;	-- Solicitud

	insert into gastoscomprobar(
				folio,fecha,tipogasto,lugarviaje,idtipoviaje,motivoviaje,diasviaje,fechainicial,fechafinal,
				distanciakms,idregion,idadscripcion,iddepartamento,idcliente,idempleadosolicita,
				idempleadobeneficiario,idestatus,importetotal,observaciones,quien,cuando)
	values(vfolio,fn_fecha_actual(),ptipogasto,plugarviaje,pidtipoviaje,pmotivoviaje,pdiasviaje,pfechainicial,pfechafinal,
				pdistanciakms,pidregion,pidadscripcion,piddepartamento,pidcliente,pidempleadosolicita,
				pidempleadobeneficiario,videstatus,0,pobservaciones,pquien,fn_fecha_actual());
		
	SET last_id = LAST_INSERT_ID();				
	
	update empleado set correoelectronico=pcorreoelectronico
	where idempleado=pidempleadobeneficiario;
	
	commit;
end$$

DELIMITER ;

