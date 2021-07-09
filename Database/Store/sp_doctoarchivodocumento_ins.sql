DELIMITER $$

DROP PROCEDURE IF EXISTS sp_doctoarchivodocumento_ins $$

CREATE PROCEDURE sp_doctoarchivodocumento_ins
(IN piddoctotipodocumento smallint,
IN pidcampollave         int,
IN pnombrearchivodocumento varchar(100),
IN pnombrearchivouuid    varchar(100),
IN pquien            varchar(15),
 OUT last_id INT)

begin
    insert into doctoarchivodocumento(iddoctotipodocumento,idcampollave,nombrearchivodocumento,nombrearchivouuid,quien,cuando)
    values(piddoctotipodocumento,pidcampollave,pnombrearchivodocumento,pnombrearchivouuid,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();				

    if piddoctotipodocumento=5 then -- se pone como justificado la incidencia laboral
        -- doctomodulo
        -- 4 INCIDENCIAS LABORALES EMPLEADOS
        -- doctotipodocumento
        -- 5 JUSTIFICACION DE INCIDENCIA LABORAL
        update empleadoincidencia set justificado='S'
        where idempleadoincidencia=pidcampollave;
    end if;

	commit;
end$$

DELIMITER ;