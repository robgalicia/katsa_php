DELIMITER $$

DROP PROCEDURE IF EXISTS sp_actaservicio_ups $$

CREATE PROCEDURE sp_actaservicio_ups
(IN pidactaservicio     int,
IN pidordenservicio     int,
IN pnumeroacta          int,
IN pfechaacta           datetime,
IN ptipoacta            char(1),
IN pobservaciones       varchar(200),
IN pquien            varchar(15),
 OUT last_id INT)

begin
    declare videstatus smallint;
    declare vfechaterminacion datetime;

    set videstatus =
        case ptipoacta
            when 'I' then 35  -- ACTIVO
            when 'C' then 37  -- TERMINADO
            when 'S' then 36  -- SUSPENSION
            when 'R' then 35  -- ACTIVO
            else 35  -- ACTIVO
        end;
    
    set vfechaterminacion=null;
    if ptipoacta='C' then
        set vfechaterminacion=pfechaacta;
    end if;
        
	if pidactaservicio = 0 then

        insert into actaservicio(idordenservicio,numeroacta,fechaacta,tipoacta,observaciones,quien, cuando)
        values (pidordenservicio,pnumeroacta,pfechaacta,ptipoacta,pobservaciones,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update actaservicio SET
            idordenservicio=pidordenservicio,
            numeroacta=pnumeroacta,
            fechaacta=pfechaacta,
            tipoacta=ptipoacta,
            observaciones=pobservaciones,
            quien=pquien,
            cuando=fn_fecha_actual()
		where idactaservicio = pidactaservicio;

		SET last_id = pidactaservicio;
	end if;

    -- actualizar estatus de orden de servicio

    update ordenservicio set idestatus=videstatus, fechaterminacion=vfechaterminacion
    where idordenservicio=pidordenservicio;

	commit;
end$$

DELIMITER ;