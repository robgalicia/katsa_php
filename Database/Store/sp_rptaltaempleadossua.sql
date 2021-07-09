DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptaltaempleadossua $$

CREATE PROCEDURE sp_rptaltaempleadossua(IN pfechainicio date, IN pfechafinal date)  
begin
	declare vregistropatronal varchar(11);

	select ifnull(registropatronal,'') into vregistropatronal
	from oficinanegocio
	where idoficinanegocio = 1;

	select 	concat(	vregistropatronal,
					lpad(ifnull(numimss,0),11,'0'),
                    ifnull(rfc,''),
                    ifnull(curp,''),
					rpad(substring(concat(ifnull(replace(apellidopaterno,'Ñ','/'),''),'$',ifnull(replace(apellidomaterno,'Ñ','/'),''),'$',ifnull(replace(nombre,'Ñ','/'),'')),1,50),50,' '),
                    1,1,DATE_FORMAT(fechaingreso,'%d%m%Y'),
                    lpad(truncate((sueldodiarioimss*100),0),7,0),
					concat('TAMAULIPAS',repeat(' ',7)),
					ifnull(lpad(numcreditoinfonavit,10,'0'),repeat(' ',10)),
                    ifnull(DATE_FORMAT(fechacreditoinfonavit,'%d%m%Y'),repeat('0',8)),
                    case tipocreditoinfonavit when 'P' then 1 when 'S' then 2 when 'C' then 3 else repeat('0',8) end,
                    case tipocreditoinfonavit 
						when 'P' then concat(lpad(floor(descuentoinfonavit),4,0), rpad(truncate(((descuentoinfonavit - floor(descuentoinfonavit)) * 100),0),4,0))
						when 'S' then concat(lpad(floor(descuentoinfonavit),4,0), lpad(truncate(((descuentoinfonavit - floor(descuentoinfonavit)) * 100),0),2,0), '00')
                        when 'C' then concat(lpad(floor(descuentoinfonavit),5,0), lpad(truncate(((descuentoinfonavit - floor(descuentoinfonavit)) * 100),0),2,0), 0) 
                        else 0 end,
						0,
						substring(vregistropatronal,1,3)
                    ) as datosempleado 
	from empleado
	where convert(ifnull(fechareingreso,fechaingreso),date) between pfechainicio and pfechafinal
	and fechabaja is null
    order by idempleado;

end$$

DELIMITER ;