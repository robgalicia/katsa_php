DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregablepuesto_all $$

CREATE PROCEDURE sp_entregablepuesto_all(IN piddepartamento smallint, IN pidentregable int)

begin

	select identregablepuesto, idpuesto, descpuesto, activo
	from (
		select 0 as identregablepuesto, p.idpuesto, p.descpuesto, 0 as activo
		from puesto p
		where p.tipopuesto='O'	-- Organigrama 
		and (p.iddepartamento=piddepartamento or piddepartamento=0)
		and p.idpuesto not in (select ep.idpuesto from entregablepuesto ep where ep.identregable=pidentregable)
		union all
		select ep.identregablepuesto, ep.idpuesto, p.descpuesto, 1 as activo
		from entregablepuesto ep
			inner join puesto p on p.idpuesto=ep.idpuesto
		where ep.identregable=pidentregable
	) as mov
	ORDER BY descpuesto;

end$$

DELIMITER ;
