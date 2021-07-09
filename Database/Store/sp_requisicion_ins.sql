DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_ins $$

CREATE PROCEDURE sp_requisicion_ins
(IN pidregion 			smallint,
IN piddepartamento      smallint,
IN pidcliente           int,
IN pidempleadosolicita  int,
IN ptiporequisicion     char(1),
IN pobservaciones       varchar(500),
IN pidadscripcion		smallint,
IN pcentrocostos 		int,
IN ptipoentrega 		char(1),
IN pplazoentrega 		smallint,
IN pquien           varchar(15),
 OUT last_id INT)  

begin

	declare vfolio varchar(12);
	declare videstatus smallint;
	
	CALL sp_foliorequisicion(pidregion,@folio);
	set vfolio=@folio;

	set videstatus=9;	-- Solicitud

	insert into requisicion(idregion,folio,fecha,iddepartamento,idcliente,idempleadosolicita,idestatus,
				importetotal,tiporequisicion,observaciones,idadscripcion,centrocostos,tipoentrega,
				plazoentrega,quien,cuando)
	values(pidregion,vfolio,fn_fecha_actual(),piddepartamento,pidcliente,pidempleadosolicita,videstatus,
				0,ptiporequisicion,pobservaciones,pidadscripcion,pcentrocostos,ptipoentrega,
				pplazoentrega,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				
	
	commit;
end$$

DELIMITER ;

