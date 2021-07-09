DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_ups $$

CREATE PROCEDURE sp_empleado_ups
(IN pidempleado  		int,
IN papellidopaterno      varchar(50),
IN papellidomaterno      varchar(50),
IN pnombre               varchar(50),
IN psexo                 char(1), 		-- 'Masculino, Femenino',
IN prfc                  varchar(13),
IN pcurp                 varchar(18),
IN pcuip                 varchar(20),
IN pnumcartilla          varchar(15),
IN pcalle                varchar(50),
IN pnumexterior          varchar(20),
IN pnuminterior          varchar(20),
IN pentrecalles          varchar(100),
IN pcolonia              varchar(50),
IN pciudad               varchar(50),
IN pidmunicipio          smallint,
IN pidestado             smallint,
IN pcodigopostal         int,
IN ptelefonocasa         varchar(30),
IN ptelefonocelular      varchar(30),
IN pcorreoelectronico    varchar(50),
IN pidestadocivil        smallint,
IN pnombreconyuge        varchar(50),
IN pidtiposangre         smallint,
IN pidnacionalidad       smallint,
IN plugarnacimiento      varchar(100),
IN pfechanacimiento      datetime,
IN pidgradoescolaridad   smallint,
IN pdocumentoescolaridad varchar(30),
IN paniodocumentoescolaridad smallint,
IN pidprofesion          smallint,
IN piddepartamento       smallint,
IN pidpuestotabulador    smallint,
IN pidpuestoorganigrama  smallint,
IN pidpuestoregistro     smallint,
IN pidregionactual       smallint,
IN pidadscripcionactual  smallint,
IN pidclienteactual		 int,
IN pfechaingreso         datetime,
IN pfechareingreso       datetime,
IN pfechabaja            datetime,
IN pmotivobaja           varchar(100),
IN pnombreemergencia     varchar(50),
IN ptelefonoemergencia   varchar(30),
IN pcorreoemergencia     varchar(50),
IN pnumimss              varchar(11),
IN psueldonetomensual    decimal(10,2),
IN psueldodiarioimss     decimal(10,2),
IN pidbanco              smallint,
IN pnumcuenta            varchar(10),
IN pclabe                varchar(18),
IN ptarjetadebito        varchar(16),
IN pnumcreditoinfonavit  varchar(10),
IN pfechacreditoinfonavit datetime,
IN ptipocreditoinfonavit char(1), 		-- Porcentaje, Salarios Minimos, Costo Fijo
IN pdescuentoinfonavit   decimal(10,2),
IN ptallacamisa          varchar(5),
IN ptallapantalon        varchar(5),
IN ptallazapatos         varchar(5),
IN ptallachamarra        varchar(5),
IN pcapbasica            char(1),
IN pcapseginmuebles      char(1),
IN pcapmanejodefensivo   char(1),
IN pcapprimerosauxilios  char(1),
IN prequiereregsnsp      char(1),
IN pidestatusregsnsp     smallint,
IN poutsourcing          char(1),
IN pidempresaoutsourcing int,
IN pnumempleado			 int,
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	declare vnombrecompleto	varchar(150);
	declare videstatus smallint;
	-- declare vnumempleado int;

	set vnombrecompleto = concat_ws(' ', ifnull(papellidopaterno,''), ifnull(papellidomaterno,''), pnombre);

	if pidempleado = 0 then	
		set videstatus=27;	-- PreRegistro

		-- select ifnull(max(numempleado),0) into vnumempleado
		-- from empleado;

		-- set vnumempleado = vnumempleado + 1;

		insert into empleado(numempleado,apellidopaterno,apellidomaterno,nombre,nombrecompleto,sexo,rfc,curp,cuip,numcartilla,calle,numexterior,
						numinterior,entrecalles,colonia,ciudad,idmunicipio,idestado,codigopostal,telefonocasa,telefonocelular,
						correoelectronico,idestadocivil,nombreconyuge,idtiposangre,idnacionalidad,lugarnacimiento,fechanacimiento,
						idgradoescolaridad,documentoescolaridad,aniodocumentoescolaridad,idprofesion,iddepartamento,idpuestotabulador,
						idpuestoorganigrama,idpuestoregistro,idregionactual,idadscripcionactual,idclienteactual,fechaingreso,fechareingreso,
						fechabaja,motivobaja,nombreemergencia,telefonoemergencia,correoemergencia,numimss,sueldonetomensual,sueldodiarioimss,
						idbanco,numcuenta,clabe,tarjetadebito,numcreditoinfonavit,fechacreditoinfonavit,tipocreditoinfonavit,
						descuentoinfonavit,tallacamisa,tallapantalon,tallazapatos,tallachamarra,idestatus,capbasica,capseginmuebles,
						capmanejodefensivo,capprimerosauxilios,requiereregsnsp,idestatusregsnsp,outsourcing,idempresaoutsourcing,quien,cuando)
		values(pnumempleado,papellidopaterno,papellidomaterno,pnombre,vnombrecompleto,psexo,prfc,pcurp,pcuip,pnumcartilla,pcalle,pnumexterior,
						pnuminterior,pentrecalles,pcolonia,pciudad,pidmunicipio,pidestado,pcodigopostal,ptelefonocasa,ptelefonocelular,
						pcorreoelectronico,pidestadocivil,pnombreconyuge,pidtiposangre,pidnacionalidad,plugarnacimiento,pfechanacimiento,
						pidgradoescolaridad,pdocumentoescolaridad,paniodocumentoescolaridad,pidprofesion,piddepartamento,pidpuestotabulador,
						pidpuestoorganigrama,pidpuestoregistro,pidregionactual,pidadscripcionactual,pidclienteactual,pfechaingreso,pfechareingreso,
						pfechabaja,pmotivobaja,pnombreemergencia,ptelefonoemergencia,pcorreoemergencia,pnumimss,psueldonetomensual,psueldodiarioimss,
						pidbanco,pnumcuenta,pclabe,ptarjetadebito,pnumcreditoinfonavit,pfechacreditoinfonavit,ptipocreditoinfonavit,
						pdescuentoinfonavit,ptallacamisa,ptallapantalon,ptallazapatos,ptallachamarra,videstatus,pcapbasica,pcapseginmuebles,
						pcapmanejodefensivo,pcapprimerosauxilios,prequiereregsnsp,pidestatusregsnsp,poutsourcing,pidempresaoutsourcing,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update empleado SET
			   numempleado=pnumempleado,
			   apellidopaterno=papellidopaterno,
			   apellidomaterno=papellidomaterno,
			   nombre=pnombre,
			   nombrecompleto=vnombrecompleto,
			   sexo=psexo,
			   rfc=prfc,
			   curp=pcurp,
			   cuip=pcuip,
			   numcartilla=pnumcartilla,
			   calle=pcalle,
			   numexterior=pnumexterior,
			   numinterior=pnuminterior,
			   entrecalles=pentrecalles,
			   colonia=pcolonia,
			   ciudad=pciudad,
			   idmunicipio=pidmunicipio,
			   idestado=pidestado,
			   codigopostal=pcodigopostal,
			   telefonocasa=ptelefonocasa,
			   telefonocelular=ptelefonocelular,
			   correoelectronico=pcorreoelectronico,
			   idestadocivil=pidestadocivil,
			   nombreconyuge=pnombreconyuge,
			   idtiposangre=pidtiposangre,
			   idnacionalidad=pidnacionalidad,
			   lugarnacimiento=plugarnacimiento,
			   fechanacimiento=pfechanacimiento,
			   idgradoescolaridad=pidgradoescolaridad,
			   documentoescolaridad=pdocumentoescolaridad,
			   aniodocumentoescolaridad=paniodocumentoescolaridad,
			   idprofesion=pidprofesion,
			   iddepartamento=piddepartamento,
			   idpuestotabulador=pidpuestotabulador,
			   idpuestoorganigrama=pidpuestoorganigrama,
			   idpuestoregistro=pidpuestoregistro,
			   idregionactual=pidregionactual,
			   idadscripcionactual=pidadscripcionactual,
			   idclienteactual=pidclienteactual,
			   fechaingreso=pfechaingreso,
			   fechareingreso=pfechareingreso,
			   fechabaja=pfechabaja,
			   motivobaja=pmotivobaja,
			   nombreemergencia=pnombreemergencia,
			   telefonoemergencia=ptelefonoemergencia,
			   correoemergencia=pcorreoemergencia,
			   numimss=pnumimss,
			   sueldonetomensual=psueldonetomensual,
			   sueldodiarioimss=psueldodiarioimss,
			   idbanco=pidbanco,
			   numcuenta=pnumcuenta,
			   clabe=pclabe,
			   tarjetadebito=ptarjetadebito,
			   numcreditoinfonavit=pnumcreditoinfonavit,
			   fechacreditoinfonavit=pfechacreditoinfonavit,
			   tipocreditoinfonavit=ptipocreditoinfonavit,
			   descuentoinfonavit=pdescuentoinfonavit,
			   tallacamisa=ptallacamisa,
			   tallapantalon=ptallapantalon,
			   tallazapatos=ptallazapatos,
			   tallachamarra=ptallachamarra,
			   -- idestatus            smallint not null,
			   capbasica=pcapbasica,
			   capseginmuebles=pcapseginmuebles,
			   capmanejodefensivo=pcapmanejodefensivo,
			   capprimerosauxilios=pcapprimerosauxilios,
			   requiereregsnsp=prequiereregsnsp,
			   idestatusregsnsp=pidestatusregsnsp,
			   outsourcing=poutsourcing,
			   idempresaoutsourcing=pidempresaoutsourcing,
			   quien=pquien,
			   cuando=fn_fecha_actual()
		where idempleado = pidempleado;

		SET last_id = pidempleado;
	end if;

	commit;
end$$

DELIMITER ;
