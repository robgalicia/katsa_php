DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_all $$

CREATE PROCEDURE sp_requisicion_all
(IN pidregion smallint, 
IN piddepartamento smallint, 
IN pidempleado int, 
IN panio int, 
IN pmes smallint,
IN pestatus char(1)) 
begin

	-- 9	SOLICITUD
	-- 10	REVISADO
	-- 11	AUTORIZADO
	-- 12	RECHAZADO
	-- 13	CANCELADO
	-- 14	ORDEN COMPRA
	-- 28	COTIZADO
				
	declare videstatus smallint;
	
	set videstatus =
		case pestatus
			when 'T' then 0
			when 'R' then 9		-- Pantalla para revisar solicitudes, entonces debe mostrar los que tienen estatus 9-SOLICITUD
			when 'A' then 28	-- Pantalla para autorizar solicitudes, entonces debe mostrar los que tienen estatus 28-COTIZADO
			else 0
		end	;

	select 	idrequisicion, folio, fecha, ifnull(fecharevision,'') as fecharevision, ifnull(fechaautorizacion,'') as fechaautorizacion, 
			ifnull(fechacancelacion,'') as fechacancelacion, importetotal,         
			case tiporequisicion when 'A' then 'ADMINISTRATIVA' when 'O' then 'OPERACIONES' when 'C' then 'CLIENTE' else 'INDEFINIDA' end as tiporequisicion,
			st.descestatus, st.idestatus
	from requisicion r
		inner join estatus st on st.idestatus=r.idestatus
	where r.idregion=pidregion and r.iddepartamento=piddepartamento
	and (r.idempleadosolicita=pidempleado or pidempleado=0)
	and year(fecha)=panio and month(fecha)=pmes
	and (r.idestatus=videstatus or videstatus=0)
	order by fecha desc;
end$$

DELIMITER ;
