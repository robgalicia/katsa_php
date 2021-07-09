DELIMITER $$

DROP PROCEDURE IF EXISTS sp_agendaentregable_ins $$

-- =============================================    
-- Author:  Eduardo Mireles Campos    
-- Create date: 05/Abr/2021
-- Modify date: 05/Abr/2021
-- Description: Insertar registro en la agenda de compromisos entregables
-- =============================================    

CREATE PROCEDURE sp_agendaentregable_ins
(IN pidpuesto smallint,
IN pidentregable int,
IN pcantidadentregable smallint,
IN pfechaini datetime,
IN pfechafin datetime,
IN pTipoEvento char(1),			-- U-Evento Único, R-Repetir Evento
IN pOpcionRepetirEvento smallint,	-- 1-Todos los días del año, 2-Cada día laborable (lunes a viernes), 3-Cada semana, 4-Cada mes
IN pDomingo smallint,			-- 0-No, 1-Si 
IN pLunes smallint,			    -- 0-No, 1-Si 
IN pMartes smallint,			-- 0-No, 1-Si 
IN pMiercoles smallint,		    -- 0-No, 1-Si 
IN pJueves smallint,			-- 0-No, 1-Si 
IN pViernes smallint,			-- 0-No, 1-Si 
IN pSabado smallint,			-- 0-No, 1-Si 
IN pCadaMes smallint,			-- 1-Mismo día del mes, 2-Primer día martes del mes
IN pquien           varchar(15))  

begin
    declare vfechahoy datetime;
    declare vinsertar smallint;

    set vfechahoy = pfechaini;
    set vinsertar = 0;    

	-- Evento Único
	if pcantidadentregable > 0 and pTipoEvento = 'U' then
		insert into agendaentregable(identregable, idpuesto, fechacompromiso, cantidadentregable, quien, cuando)    
		values(pidentregable, pidpuesto, vfechahoy, pcantidadentregable, pquien, fn_fecha_actual());
    end if;

	-- Repetir Evento    
	if pcantidadentregable > 0 and pTipoEvento = 'R' then
		While vfechahoy <= pfechafin do

			-- 1-Todos los días del año
			if pOpcionRepetirEvento = 1 then
				set vinsertar=1;
            end if;

			-- 2-Cada día laborable (lunes a viernes)
			if pOpcionRepetirEvento = 2 and Upper(DAYNAME(vfechahoy)) not in ('SÁBADO', 'SABADO', 'SATURDAY', 'DOMINGO', 'SUNDAY') then
				set vinsertar=1;
            end if;

			-- 3-Cada semana
			if pOpcionRepetirEvento = 3 then
				if pDomingo = 1 and Upper(DAYNAME(vfechahoy)) in ('DOMINGO', 'SUNDAY') then
					set vinsertar=1;
                end if;
				if pLunes = 1 and Upper(DAYNAME(vfechahoy)) in ('LUNES', 'MONDAY') then
					set vinsertar=1;
                end if;
				if pMartes = 1 and Upper(DAYNAME(vfechahoy)) in ('MARTES', 'TUESDAY') then
					set vinsertar=1;
                end if;
				if pMiercoles = 1 and Upper(DAYNAME(vfechahoy)) in ('MIÉRCOLES', 'MIERCOLES', 'WEDNESDAY') then
					set vinsertar=1;
                end if;
				if pJueves = 1 and Upper(DAYNAME(vfechahoy)) in ('JUEVES', 'THURSDAY') then
					set vinsertar=1;
                end if;
				if pViernes = 1 and Upper(DAYNAME(vfechahoy)) in ('VIERNES', 'FRIDAY') then
					set vinsertar=1;
                end if;
				if pSabado = 1 and Upper(DAYNAME(vfechahoy)) in ('SÁBADO', 'SABADO', 'SATURDAY') then
					set vinsertar=1;
                end if;
			end if;

			-- 4-Cada mes
			if pOpcionRepetirEvento = 4 then
				-- 1-Mismo día del mes
				if pCadaMes=1 and DAY(vfechahoy) = DAY(pfechaini) then
					set vinsertar=1;
                end if;
				
				-- 2-Primer día (martes) del mes
				if pCadaMes=2 and DAYNAME(vfechahoy) = DAYNAME(pfechaini) and DAY(vfechahoy) < 8 then
					set vinsertar=1;
			    end if;
			end if;

			if vinsertar=1 then
                insert into agendaentregable(identregable, idpuesto, fechacompromiso, cantidadentregable, quien, cuando)    
                values(pidentregable, pidpuesto, vfechahoy, pcantidadentregable, pquien, fn_fecha_actual());
            end if;

			-- Sumar 1 día a la fecha de compromiso
            set vfechahoy = DATE_ADD(vfechahoy,INTERVAL 1 DAY);
			set vinsertar=0;


        end while;
    end if;

	commit;
end$$

DELIMITER ;
