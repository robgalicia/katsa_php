DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipodocumento_ups $$

CREATE PROCEDURE sp_tipodocumento_ups
(IN pidtipodocumento	smallint,
IN pdesctipodocumento    varchar(50),
IN psolicitarvigencia    char(1),
IN pobligatorioempleado  char(1),
IN pobligatoriosnsp      char(1),
IN pobligatoriocliente   char(1),
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidtipodocumento = 0 then	

		insert into tipodocumento(desctipodocumento,solicitarvigencia,obligatorioempleado,obligatoriosnsp,obligatoriocliente,quien,cuando)
		values(pdesctipodocumento,psolicitarvigencia,pobligatorioempleado,pobligatoriosnsp,pobligatoriocliente,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tipodocumento SET
			   desctipodocumento=pdesctipodocumento,
			   solicitarvigencia=psolicitarvigencia,
			   obligatorioempleado=pobligatorioempleado,
			   obligatoriosnsp=pobligatoriosnsp,
			   obligatoriocliente=pobligatoriocliente,
			   quien=pquien,
			   cuando=fn_fecha_actual()
		where idtipodocumento = pidtipodocumento;

		SET last_id = pidtipodocumento;
	end if;

	commit;
end$$

DELIMITER ;

