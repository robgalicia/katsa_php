DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_all $$

CREATE PROCEDURE sp_gastoscomprobar_all
(IN pidregion smallint, 
IN piddepartamento smallint, 
IN pidempleado int, 
IN panio int, 
IN pmes smallint,
IN pestatus char(1)) 
begin

	-- 15	SOLICITUD
	-- 26	VALIDADO
	-- 16	REVISADO
	-- 17	AUTORIZADO
	-- 18	RECHAZADO
	-- 19	CANCELADO
	-- 20	ENTREGADO
	-- 21	COMPROBADO
	-- 22	CONCILIADO
						
	declare videstatus smallint;
	
	set videstatus =
		case pestatus
			when 'T' then 0
			when 'V' then 15	-- Pantalla para validar solicitudes, debe mostrar los que tienen estatus 15-SOLICITUD
			when 'R' then 26	-- Pantalla para revisar solicitudes, entonces debe mostrar los que tienen estatus 26-VALIDADO
			when 'A' then 16	-- Pantalla para autorizar solicitudes, entonces debe mostrar los que tienen estatus 16-REVISADO
			when 'C' then 20	-- Pantalla comprobación de gastoscomprobar, mostrar los que tienen estatus 20-ENTREGADO
			when 'I' then 21	-- Administrar Solicitudes, conciliación de gastoscomprobar, mostrar los que tienen estatus 21-COMPROBADO
			else 0
		end	;

	select 	idgastoscomprobar, folio, fecha, ifnull(fecharevision,'') as fecharevision, ifnull(fechaautorizacion,'') as fechaautorizacion, 
			ifnull(fechacancelacion,'') as fechacancelacion, importetotal,         
			case tipogasto when 'I' then 'INTERNA' when 'E' then 'ESPECIAL' else 'INDEFINIDA' end as tipogasto,        
			st.descestatus, gc.idestatus,ifnull(fechalimitecomprobacion,'') as fechalimitecomprobacion,
			ifnull(fechacomprobacion,'') as fechacomprobacion
	from gastoscomprobar gc
		inner join estatus st on st.idestatus=gc.idestatus
	where gc.idregion=pidregion and gc.iddepartamento=piddepartamento
	and (gc.idempleadosolicita=pidempleado or pidempleado=0)
	and year(fecha)=panio and month(fecha)=pmes
	and (gc.idestatus=videstatus or videstatus=0)
	order by fecha desc;
end$$

DELIMITER ;
