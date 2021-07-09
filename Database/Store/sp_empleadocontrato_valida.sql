DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadocontrato_valida $$

CREATE PROCEDURE sp_empleadocontrato_valida
(IN pidempleado int,
 OUT valida smallint,
 OUT mensaje varchar(100))
-- Se verifica que el empleado tenga todos los documentos obligatorios y
-- que sus documentos estén vigentes
begin
    set valida=1;
    set mensaje='OK';

    -- validar que tenga todos los documentos obligatorios
    if exists(  select 1 from tipodocumento
                where obligatorioempleado='S'
                and idtipodocumento not in (select idtipodocumento from empleadodocumento 
                                            where idempleado=pidempleado)) then
        set valida=0;
        set mensaje='AL EMPLEADO LE HACEN FALTA DOCUMENTOS OBLIGATORIOS';
    end if;

    -- validar que sus documentos se encuentren vigentes
    if exists(  select 1
                from empleadodocumento ed
                    inner join tipodocumento td on td.idtipodocumento=ed.idtipodocumento
                where ed.idempleado=pidempleado
                and convert(ed.finalvigencia,date) <= convert(fn_fecha_actual(),date)
                and td.solicitarvigencia='S') then
        set valida=0;
        set mensaje='EL EMPLEADO TIENE DOCUMENTOS VENCIDOS';
    end if;

end$$

DELIMITER ;
