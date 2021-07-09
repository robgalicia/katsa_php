DELIMITER $$

DROP TRIGGER IF EXISTS tgra_cliente_ins $$
 
CREATE TRIGGER tgra_cliente_ins AFTER INSERT ON cliente
 FOR EACH ROW 
 
BEGIN
	declare vconsecutivo smallint;

    -- Insertar registro en tabla de domicilios
    insert into clientedomiciliofiscal(idcliente,nombre,nombrecomercial,calle,numexterior,numinterior,
                colonia,ciudad,idmunicipio,idestado,codigopostal,rfc,personacontacto,telefonocontacto,
                correoelectronico,cveusocfdi,porcentajeiva,quien,cuando)
    values(new.idcliente,new.nombre,new.nombrecomercial,new.calle,new.numexterior,new.numinterior,
            new.colonia,new.ciudad,new.idmunicipio,new.idestado,new.codigopostal,new.rfc,new.personacontacto,
            new.telefonocontacto,new.correoelectronico,new.cveusocfdi,new.porcentajeiva,new.quien,fn_fecha_actual());

END$$    
 
DELIMITER ;