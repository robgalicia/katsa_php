	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuariomenu_ups $$

CREATE PROCEDURE sp_usuariomenu_ups(IN pidusuario smallint, IN pmenuid smallint)
begin
	declare vpadreid smallint;
	
	select padreid into vpadreid
	from menu 
	where menuid=pmenuid;

	if exists(select 1 from usuariomenu where idusuario=pidusuario and menuid=pmenuid) then
		delete from usuariomenu 
		where idusuario=pidusuario and menuid=pmenuid;

		-- Si ya no hay hijos borramos al padre  
		if ((select count(*) from usuariomenu where idusuario=pidusuario and menuid in (select menuid from menu where padreid = vpadreid))=1) then
			delete from usuariomenu where idusuario=pidusuario and menuid=vpadreid;
		end if;
	else
		-- Si no existe el padre, lo agregamos  
		if not exists(select 1 from usuariomenu where idusuario=pidusuario and menuid=vpadreid) then
			insert into usuariomenu(idusuario, menuid)
			values(pidusuario, vpadreid);
		end if;
		insert into usuariomenu(idusuario, menuid)
		values(pidusuario, pmenuid);
	end if;
	commit;
end$$

DELIMITER ;
