DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompra_all $$

CREATE PROCEDURE sp_ordencompra_all
(IN pidregion smallint, 
IN piddepartamento smallint, 
IN panio int, 
IN pmes smallint,
IN pfoliorequi varchar(12)) 
begin
	select 	oc.idordencompra, req.folio as foliorequisicion, oc.folio as folioordencompra, oc.fechaorden, p.nombre as nombreproveedor,
			oc.importetotal, st.descestatus, ifnull(ocf.fechafactura,'') as fechafactura, oc.idestatus, ifnull(ocf.idordencomprafactura,0) as idordencomprafactura
	from ordencompra oc
		inner join requisicion req on req.idrequisicion=oc.idrequisicion
		inner join proveedor p on p.idproveedor=oc.idproveedor
		inner join estatus st on st.idestatus=oc.idestatus
		left outer join ordencomprafactura ocf on ocf.idordencompra=oc.idordencompra
	where (oc.idregion=pidregion and oc.iddepartamento=piddepartamento
	and year(fechaorden)=panio and month(fechaorden)=pmes
	and pfoliorequi='')
	or req.folio=pfoliorequi
	order by fechaorden desc;
end$$

DELIMITER ;
