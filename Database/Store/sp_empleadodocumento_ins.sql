DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadodocumento_ins $$

CREATE PROCEDURE sp_empleadodocumento_ins
(IN pidempleado    			int,
IN pidtipodocumento      	smallint,
IN pesoriginal  			char(1),
IN pfolio                	varchar(20),
IN pfechaemision         	datetime,
IN piniciovigencia         	datetime,
IN pfinalvigencia         	datetime,
IN pnombrearchivo           varchar(100),
IN pquien                	varchar(15),
 OUT last_id INT)  

begin
	insert into empleadodocumento(idempleado,idtipodocumento,esoriginal,folio,fechaemision,iniciovigencia,finalvigencia,nombrearchivo,quien,cuando)
	values(pidempleado,pidtipodocumento,pesoriginal,pfolio,pfechaemision,piniciovigencia,pfinalvigencia,pnombrearchivo,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();				

	commit;
end$$

DELIMITER ;

