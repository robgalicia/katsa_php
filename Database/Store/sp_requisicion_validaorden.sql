DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_validaorden $$

CREATE PROCEDURE sp_requisicion_validaorden
(IN pidrequisicion  int,
 OUT estatus        varchar(02),
 OUT observaciones  varchar(100)
 )  

begin

	SET estatus = 'OK';
	SET observaciones = '';

    if exists(select 1 from requisiciondetalle where idrequisicion=pidrequisicion and ifnull(idproveedor,0)=0) then
	    SET estatus = 'NO';
	    SET observaciones = 'ASIGNAR PROVEEDOR A TODOS LOS ARTICULOS';
    end if;

    if estatus = 'OK' and exists(select 1 from requisiciondetalle where idrequisicion=pidrequisicion and ifnull(total,0)=0.00) then
	    SET estatus = 'NO';
	    SET observaciones = 'ASIGNAR PRECIO A TODOS LOS ARTICULOS';
    end if;


end$$

DELIMITER ;

