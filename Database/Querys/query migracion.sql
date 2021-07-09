select * from tmpestadofuerzaexcel;

delete from tmpestadofuerzaexcel;
commit;

alter table tmpestadofuerzaexcel
drop column idregion;

alter table tmpestadofuerzaexcel
drop column idadscripcion;

delete from tmpestadofuerzaexcel where numero=0;
commit;

-- ----------------------------------------------------------------------------------------------------------------
-- Regiones
-- ----------------------------------------------------------------------------------------------------------------

alter table tmpestadofuerzaexcel
add idregion smallint;

select distinct idregion, region
from tmpestadofuerzaexcel;

-- PERSONAL REGION NORTE
-- PERSONAL REGION CENTRO
-- OFICINAS ADMINISTRATIVAS

select * from region;

update tmpestadofuerzaexcel set idregion=1 where region like '%ADMINISTRATIVAS%';
update tmpestadofuerzaexcel set idregion=2 where region like '%CENTRO%';
update tmpestadofuerzaexcel set idregion=3 where region like '%NORTE%';
commit;

-- ----------------------------------------------------------------------------------------------------------------
-- Lugar de Adscripción
-- ----------------------------------------------------------------------------------------------------------------

alter table tmpestadofuerzaexcel
add idadscripcion smallint;

select idregion, region, adscripcion, idadscripcion, count(*)
from tmpestadofuerzaexcel
group by idregion, region, adscripcion, idadscripcion;

/*
1	OFICINAS ADMINISTRATIVAS	Administraci?n Reynosa
1	OFICINAS ADMINISTRATIVAS	Analisis y Monitoreo
1	OFICINAS ADMINISTRATIVAS	Corporativo  CdMx
1	OFICINAS ADMINISTRATIVAS	Corporativo  Victoria
1	OFICINAS ADMINISTRATIVAS	Regi?n Centro
1	OFICINAS ADMINISTRATIVAS	Regi?n Norte del Pa?s
*/

select * from adscripcion
where idregion=1;

update tmpestadofuerzaexcel set idadscripcion=1 where idregion=1 and adscripcion like '%CdMx%';
update tmpestadofuerzaexcel set idadscripcion=2 where idregion=1 and adscripcion like '%Victoria%';
update tmpestadofuerzaexcel set idadscripcion=3 where idregion=1 and adscripcion like '%Reynosa%';
update tmpestadofuerzaexcel set idadscripcion=8 where idregion=1 and adscripcion like '%Monitoreo%';
update tmpestadofuerzaexcel set idadscripcion=9 where idregion=1 and adscripcion like '%Centro%';
update tmpestadofuerzaexcel set idadscripcion=11 where idregion=1 and adscripcion like '%Norte%';
commit;


/*
2	PERSONAL REGION CENTRO	La Mesa Ciudad Victoria
2	PERSONAL REGION CENTRO	Mesa La Paz
2	PERSONAL REGION CENTRO	Tres Mesas I, II, III y IV
2	PERSONAL REGION CENTRO	Vicente Guerrero
*/

select * from adscripcion
where idregion=2;

update tmpestadofuerzaexcel set idadscripcion=4 where idregion=2 and adscripcion like '%Victoria%';
update tmpestadofuerzaexcel set idadscripcion=5 where idregion=2 and adscripcion like '%Paz%';
update tmpestadofuerzaexcel set idadscripcion=12 where idregion=2 and adscripcion like '%Tres%';
update tmpestadofuerzaexcel set idadscripcion=13 where idregion=2 and adscripcion like '%Guerrero%';
commit;


/*
3	PERSONAL REGION NORTE	F?brica de Palas
3	PERSONAL REGION NORTE	Fenicias
3	PERSONAL REGION NORTE	PE Salitrillos
3	PERSONAL REGION NORTE	PER4 - Reynosa IV
3	PERSONAL REGION NORTE	PER5 - Reynosa V
3	PERSONAL REGION NORTE	Regi?n Norte
*/

select * from adscripcion
where idregion=3;

update tmpestadofuerzaexcel set idadscripcion=14 where idregion=3 and adscripcion like '%Palas%';
update tmpestadofuerzaexcel set idadscripcion=6 where idregion=3 and adscripcion like '%Fenicias%';
update tmpestadofuerzaexcel set idadscripcion=7 where idregion=3 and adscripcion like '%Salitrillos%';
update tmpestadofuerzaexcel set idadscripcion=15 where idregion=3 and adscripcion like '%PER4%';
update tmpestadofuerzaexcel set idadscripcion=16 where idregion=3 and adscripcion like '%PER5%';
update tmpestadofuerzaexcel set idadscripcion=17 where idregion=3 and adscripcion like '%Norte%';
commit;

-- ----------------------------------------------------------------------------------------------------------------
-- Estatus del Empleado
-- ----------------------------------------------------------------------------------------------------------------

select * from estatus;
-- 1	ACTIVO

-- ----------------------------------------------------------------------------------------------------------------
-- Estado y Municipio
-- ----------------------------------------------------------------------------------------------------------------

select entidad, municipio, count(*)
from tmpestadofuerzaexcel
group by entidad, municipio;

/*
CdMx	CdMx	6
Coahuila	Acu?a	1
Tamps	G??mez	7
Tamps	Llera	23
Tamps	Matamoros	3
Tamps	Reynosa	24
Tamps	Victoria	14
*/

alter table tmpestadofuerzaexcel
add idestado smallint;

alter table tmpestadofuerzaexcel
add idmunicipio smallint;

select * from estado;
-- 5	COAHUILA
-- 9	CIUDAD DE MEXICO

select * from municipio where idestado=28;

update tmpestadofuerzaexcel set idestado=5, idmunicipio=77 where entidad like '%Coahuila%' and municipio like '%Acu%';
update tmpestadofuerzaexcel set idestado=9, idmunicipio=319 where entidad like '%CdMx%' and municipio like '%CdMx%';
update tmpestadofuerzaexcel set idestado=28, idmunicipio=13 where entidad like '%Tamps%' and municipio like '%G??mez%';
update tmpestadofuerzaexcel set idestado=28, idmunicipio=19 where entidad like '%Tamps%' and municipio like '%Llera%';
update tmpestadofuerzaexcel set idestado=28, idmunicipio=22 where entidad like '%Tamps%' and municipio like '%Matamoros%';
update tmpestadofuerzaexcel set idestado=28, idmunicipio=32 where entidad like '%Tamps%' and municipio like '%Reynosa%';
update tmpestadofuerzaexcel set idestado=28, idmunicipio=41 where entidad like '%Tamps%' and municipio like '%Victoria%';
commit;

select entidad, municipio, idestado, idmunicipio, count(*)
from tmpestadofuerzaexcel
group by entidad, municipio, idestado, idmunicipio;


-- ----------------------------------------------------------------------------------------------------------------
-- Empresa Outsourcing
-- ----------------------------------------------------------------------------------------------------------------

select empresa, count(*)
from tmpestadofuerzaexcel
group by empresa;

-- KPS	70
-- RH	8

select * from empresaoutsourcing;
update empresaoutsourcing set nombrecorto='RH' where idempresaoutsourcing=1;
commit;

-- ----------------------------------------------------------------------------------------------------------------
-- Clientes
-- ----------------------------------------------------------------------------------------------------------------

select cliente, count(*)
from tmpestadofuerzaexcel
group by cliente;

-- 1 Katsa	20
-- 2 Vestas Service	43
-- 3 AES	8
-- 4 Area 2017	1
-- 5 GES	2
-- 6 TBD	1
-- 7 Vestas Denmark	3 --> Vestas Wind Systems
-- 8 Vestas Construcción

alter table tmpestadofuerzaexcel
add idcliente smallint;

select * from cliente;
update cliente set nombre='VESTAS DENMARK --> VESTAS WIND SYSTEMS' where idcliente=7;
commit;

update tmpestadofuerzaexcel set idcliente=1 where cliente='Katsa';
update tmpestadofuerzaexcel set idcliente=2 where cliente='Vestas Service';
update tmpestadofuerzaexcel set idcliente=3 where cliente='AES';
update tmpestadofuerzaexcel set idcliente=4 where cliente='Area 2017';
update tmpestadofuerzaexcel set idcliente=5 where cliente='GES';
update tmpestadofuerzaexcel set idcliente=6 where cliente='TBD';
update tmpestadofuerzaexcel set idcliente=7 where cliente like '%Denmark%';
commit;

select cliente, idcliente, count(*)
from tmpestadofuerzaexcel
group by cliente, idcliente;

-- ----------------------------------------------------------------------------------------------------------------
-- Nombre del Empleado
-- ----------------------------------------------------------------------------------------------------------------

update tmpestadofuerzaexcel set nombre=upper(nombre);
commit;

select nombre
from tmpestadofuerzaexcel;

-- ----------------------------------------------------------------------------------------------------------------
-- Salario Neto
-- ----------------------------------------------------------------------------------------------------------------

select distinct salarioneto
from tmpestadofuerzaexcel;

update tmpestadofuerzaexcel set salarioneto=0;
commit;

-- ----------------------------------------------------------------------------------------------------------------
-- Puesto Tabulador
-- ----------------------------------------------------------------------------------------------------------------

select puestotabulador, count(*)
from tmpestadofuerzaexcel
group by puestotabulador;

/*
	13
Administrador ?nico	1
Coordinador	2
Director	1
Enlace Operativo	1
Guardia	45
Jefe de Departamento	1
Jefe de Turno	7
Supervisor	6
TBD	1
*/

alter table tmpestadofuerzaexcel
add idpuestotabulador smallint;

select * from puesto where tipopuesto='T';

update tmpestadofuerzaexcel set idpuestotabulador=1 where puestotabulador like '%Administrador%';
update tmpestadofuerzaexcel set idpuestotabulador=2 where puestotabulador like '%Coordinador%';
update tmpestadofuerzaexcel set idpuestotabulador=3 where puestotabulador like '%Director%';
update tmpestadofuerzaexcel set idpuestotabulador=4 where puestotabulador like '%Enlace%';
update tmpestadofuerzaexcel set idpuestotabulador=5 where puestotabulador like '%Guardia%';
update tmpestadofuerzaexcel set idpuestotabulador=6 where puestotabulador like '%Departamento%';
update tmpestadofuerzaexcel set idpuestotabulador=7 where puestotabulador like '%Turno%';
update tmpestadofuerzaexcel set idpuestotabulador=8 where puestotabulador like '%Supervisor%';
update tmpestadofuerzaexcel set idpuestotabulador=9 where idpuestotabulador is null;
commit;

select puestotabulador, idpuestotabulador, count(*)
from tmpestadofuerzaexcel
group by puestotabulador, idpuestotabulador;

-- ----------------------------------------------------------------------------------------------------------------
-- Puesto Organigrama
-- ----------------------------------------------------------------------------------------------------------------

select puestoorganigrama, count(*)
from tmpestadofuerzaexcel
group by puestoorganigrama
order by puestoorganigrama;

/*
	1
Auditor Interno	1
Auxiliar Administrativo	2
Auxiliar Contable	1
Auxiliar de an?lisis	2
Control de Accesos	3
Coordinador	2
Copiloto de Avanzada 
 Oficial de Informaci?n	10
Copiloto de Transporte de Personal
 Oficial de Info	10
Copiloto de Transporte de Personal 
 Oficial de Inf	1
Cubreturnos	1
Director Administrativo	1
Director de Operaciones	1
Enlace Jur?dico	1
Enlace Operativo	1
Gerente Administrativo	1
Gerente de Contabilidad	1
Gestor?a	1
Jefe del Departamento de An?lisis y Monitoreo	1
L?der de Avanzada	13
Limpieza	1
Operador de Apoyo Log?stico	1
Operador de Transporte de Personal	11
Param?dico	1
Recursos Humanos	1
Supervisor	5
TBD	2
Tesorer?a	1
*/

alter table tmpestadofuerzaexcel
add idpuestoorganigrama smallint;

select * from puesto where tipopuesto='O' order by descpuesto;

update tmpestadofuerzaexcel set idpuestoorganigrama=10 where puestoorganigrama like '%Auditor%';
update tmpestadofuerzaexcel set idpuestoorganigrama=11 where puestoorganigrama like '%Auxiliar Administrativo%';
update tmpestadofuerzaexcel set idpuestoorganigrama=12 where puestoorganigrama like '%Auxiliar Contable%';
update tmpestadofuerzaexcel set idpuestoorganigrama=13 where puestoorganigrama like '%Auxiliar de an%';
update tmpestadofuerzaexcel set idpuestoorganigrama=14 where puestoorganigrama like '%Control de Accesos%';
update tmpestadofuerzaexcel set idpuestoorganigrama=15 where puestoorganigrama like '%Coordinador%';
update tmpestadofuerzaexcel set idpuestoorganigrama=16 where puestoorganigrama like '%Copiloto de Avanzada%';
update tmpestadofuerzaexcel set idpuestoorganigrama=17 where puestoorganigrama like '%Copiloto de Transporte%';
update tmpestadofuerzaexcel set idpuestoorganigrama=18 where puestoorganigrama like '%Cubreturnos%';
update tmpestadofuerzaexcel set idpuestoorganigrama=19 where puestoorganigrama like '%Director Administrativo%';
update tmpestadofuerzaexcel set idpuestoorganigrama=20 where puestoorganigrama like '%Director de Operaciones%';
update tmpestadofuerzaexcel set idpuestoorganigrama=21 where puestoorganigrama like '%Enlace Jur%';
update tmpestadofuerzaexcel set idpuestoorganigrama=22 where puestoorganigrama like '%Enlace Operativo%';
update tmpestadofuerzaexcel set idpuestoorganigrama=23 where puestoorganigrama like '%Gerente Administrativo%';
update tmpestadofuerzaexcel set idpuestoorganigrama=24 where puestoorganigrama like '%Gerente de Contabilidad%';
update tmpestadofuerzaexcel set idpuestoorganigrama=25 where puestoorganigrama like '%Gestor%';
update tmpestadofuerzaexcel set idpuestoorganigrama=26 where puestoorganigrama like '%Jefe del Departamento de An%';
update tmpestadofuerzaexcel set idpuestoorganigrama=27 where puestoorganigrama like '%der de Avanzada%';
update tmpestadofuerzaexcel set idpuestoorganigrama=28 where puestoorganigrama like '%Limpieza%';
update tmpestadofuerzaexcel set idpuestoorganigrama=29 where puestoorganigrama like '%Operador de Apoyo%';
update tmpestadofuerzaexcel set idpuestoorganigrama=30 where puestoorganigrama like '%Operador de Transporte%';
update tmpestadofuerzaexcel set idpuestoorganigrama=31 where puestoorganigrama like '%Param%';
update tmpestadofuerzaexcel set idpuestoorganigrama=32 where puestoorganigrama like '%Recursos%';
update tmpestadofuerzaexcel set idpuestoorganigrama=33 where puestoorganigrama like '%Supervisor%';
update tmpestadofuerzaexcel set idpuestoorganigrama=35 where puestoorganigrama like '%Tesorer%';
update tmpestadofuerzaexcel set idpuestoorganigrama=34 where idpuestoorganigrama is null;
commit;

select puestoorganigrama, idpuestoorganigrama, count(*)
from tmpestadofuerzaexcel
group by puestoorganigrama, idpuestoorganigrama;

-- ----------------------------------------------------------------------------------------------------------------
-- Puesto Registro
-- ----------------------------------------------------------------------------------------------------------------

select puestoregistro, count(*)
from tmpestadofuerzaexcel
group by puestoregistro;

/*
	1
Administrativo	17
Operativo	60
*/

alter table tmpestadofuerzaexcel
add idpuestoregistro smallint;

select * from puesto where tipopuesto='R' order by descpuesto;

update tmpestadofuerzaexcel set idpuestoregistro=36 where puestoregistro like '%Administrativo%';
update tmpestadofuerzaexcel set idpuestoregistro=37 where idpuestoregistro is null;
commit;

select puestoregistro, idpuestoregistro, count(*)
from tmpestadofuerzaexcel
group by puestoregistro, idpuestoregistro;

-- ----------------------------------------------------------------------------------------------------------------
-- Requiere Registro
-- ----------------------------------------------------------------------------------------------------------------

select requiereregistro, count(*)
from tmpestadofuerzaexcel
group by requiereregistro;

update tmpestadofuerzaexcel set requiereregistro='NO' where requiereregistro in ('','No','Pe');
update tmpestadofuerzaexcel set requiereregistro='SI' where requiereregistro = 'S?';
commit;

-- ----------------------------------------------------------------------------------------------------------------
-- Estatus Registro
-- ----------------------------------------------------------------------------------------------------------------

select estatusregistro, count(*)
from tmpestadofuerzaexcel
group by estatusregistro;

/*
	1
Inscrito	13
No aplica	17
Pendiente	1
Sin registro	46
*/

alter table tmpestadofuerzaexcel
add idestatusregistro smallint;

select * from estatus;

update tmpestadofuerzaexcel set idestatusregistro=3 where estatusregistro like '%aplica%';
update tmpestadofuerzaexcel set idestatusregistro=4 where estatusregistro like '%Inscrito%';
update tmpestadofuerzaexcel set idestatusregistro=5 where estatusregistro like '%registro%';
update tmpestadofuerzaexcel set idestatusregistro=5 where estatusregistro like '%Pendiente%';
update tmpestadofuerzaexcel set idestatusregistro=3 where idestatusregistro is null;
commit;

select estatusregistro, idestatusregistro, count(*)
from tmpestadofuerzaexcel
group by estatusregistro, idestatusregistro;

-- ----------------------------------------------------------------------------------------------------------------
-- Capacitación
-- ----------------------------------------------------------------------------------------------------------------

select basic, count(*)
from tmpestadofuerzaexcel
group by basic;

update tmpestadofuerzaexcel set basic='S' where basic='?';
update tmpestadofuerzaexcel set basic='N' where basic='';
commit;

select seginmueb, count(*)
from tmpestadofuerzaexcel
group by seginmueb;

update tmpestadofuerzaexcel set seginmueb='S' where seginmueb='?';
update tmpestadofuerzaexcel set seginmueb='N' where seginmueb='';
commit;

select manejodef, count(*)
from tmpestadofuerzaexcel
group by manejodef;

update tmpestadofuerzaexcel set manejodef='S' where manejodef='?';
update tmpestadofuerzaexcel set manejodef='N' where manejodef='';
commit;

select primerosaux, count(*)
from tmpestadofuerzaexcel
group by primerosaux;

update tmpestadofuerzaexcel set primerosaux='S' where primerosaux='?';
update tmpestadofuerzaexcel set primerosaux='N' where primerosaux='';
commit;


-- ----------------------------------------------------------------------------------------------------------------
-- Grupo Sanguineo
-- ----------------------------------------------------------------------------------------------------------------

select gruposanguineo, count(*)
from tmpestadofuerzaexcel
group by gruposanguineo;

/*
	18
A Rh +	8
A+		1
A Rh -	2
B Rh +	3
B+		2
B Rh -	2
O Rh +	36
0 Rh+	1
O+		2
O Rh -	2
AB Rh +	1
*/

alter table tmpestadofuerzaexcel
add idtiposangre smallint;

select * from tiposangre;

update tmpestadofuerzaexcel set idtiposangre=2 where gruposanguineo in ('A Rh +','A+');
update tmpestadofuerzaexcel set idtiposangre=3 where gruposanguineo in ('A Rh -');
update tmpestadofuerzaexcel set idtiposangre=4 where gruposanguineo in ('B Rh +','B+');
update tmpestadofuerzaexcel set idtiposangre=5 where gruposanguineo in ('B Rh -');
update tmpestadofuerzaexcel set idtiposangre=6 where gruposanguineo in ('O Rh +','0 Rh+','O+');
update tmpestadofuerzaexcel set idtiposangre=7 where gruposanguineo in ('O Rh -');
update tmpestadofuerzaexcel set idtiposangre=8 where gruposanguineo in ('AB Rh +');
update tmpestadofuerzaexcel set idtiposangre=1 where idtiposangre is null;
commit;

select gruposanguineo, idtiposangre, count(*)
from tmpestadofuerzaexcel
group by gruposanguineo, idtiposangre;

-- ----------------------------------------------------------------------------------------------------------------
-- Vehiculos
-- ----------------------------------------------------------------------------------------------------------------

select vehiculoasignado, count(*)
from tmpestadofuerzaexcel
group by vehiculoasignado;

update tmpestadofuerzaexcel set vehiculoasignado='SI' where vehiculoasignado='S?';
update tmpestadofuerzaexcel set vehiculoasignado=upper(vehiculoasignado);
commit;

select * from empleado;

select *
from empleadodocumento ed
	left outer join tipodocumento td on td.idtipodocumento=ed.idtipodocumento
where idempleado=5;

select 	td.idtipodocumento, td.desctipodocumento, td.solicitarvigencia, td.solicitararchivo, 
		ifnull(ed.idempleadodocumento,0) as idempleadodocumento,
		ifnull(ed.idempleado,0) as idempleado,
		ifnull(ed.esoriginal,'') as esoriginal,
		ifnull(ed.folio,0) as folio,
		ifnull(ed.fechaemision,0) as fechaemision,
		ifnull(ed.iniciovigencia,0) as iniciovigencia,
		ifnull(ed.finalvigencia,0) as finalvigencia
from tipodocumento td
	left outer join empleadodocumento ed on ed.idtipodocumento=td.idtipodocumento and ed.idempleado=5
order by td.idtipodocumento;

insert into empleadodocumento(idempleado,idtipodocumento,esoriginal,folio,fechaemision,iniciovigencia,finalvigencia,nombrearchivo,quien,cuando)
values(5,2,'N','123','2020-01-01','2020-01-01','2020-12-31','x','emireles',fn_fecha_actual());
   commit;
   
		insert into empleado(apellidopaterno,apellidomaterno,nombre,nombrecompleto,sexo,rfc,curp,cuip,numcartilla,calle,numexterior,
						numinterior,entrecalles,colonia,ciudad,idmunicipio,idestado,codigopostal,telefonocasa,telefonocelular,
						correoelectronico,idestadocivil,nombreconyuge,idtiposangre,idnacionalidad,lugarnacimiento,fechanacimiento,
						idgradoescolaridad,documentoescolaridad,aniodocumentoescolaridad,idprofesion,iddepartamento,idpuestotabulador,
						idpuestoorganigrama,idpuestoregistro,idregionactual,idadscripcionactual,idclienteactual,fechaingreso,fechareingreso,
						fechabaja,motivobaja,nombreemergencia,telefonoemergencia,correoemergencia,numimss,sueldonetomensual,sueldodiarioimss,
						idbanco,numcuenta,clabe,tarjetadebito,numcreditoinfonavit,fechacreditoinfonavit,tipocreditoinfonavit,
						descuentoinfonavit,tallacamisa,tallapantalon,tallazapatos,tallachamarra,idestatus,capbasica,capseginmuebles,
						capmanejodefensivo,capprimerosauxilios,requiereregsnsp,idestatusregsnsp,outsourcing,idempresaoutsourcing,quien,cuando)
select nombre, '', '', nombre, case sexo when 'H' then 'M' else 'F' end as sexo, rfc, curp, cuip, null, null, null,
		null, null, null, null, idmunicipio, idestado, null, null, null,
		null, 1 idestadocivil, null, idtiposangre, 1 as idnacionalidad, null, concat('19',substring(rfc,5,2),'-',substring(rfc,7,2),'-',substring(rfc,9,2)) as fechanacimiento,
		4 idgradoescolaridad, null, null, 14 as idprofesion, 3 as iddepartamento, idpuestotabulador,
		idpuestoorganigrama, idpuestoregistro, idregion, idadscripcion, idcliente, concat(substring(fechaalta,7,4),'-',substring(fechaalta,4,2),'-',substring(fechaalta,1,2)) as fechaingreso, null,
        null, null, null, null, null, nss, 0, 0,
		null, null, null, null, null, null, null,
        null, null, null, null, null, 1, basic, seginmueb,
		manejodef, primerosaux, substring(requiereregistro,1,1) as requiereregistro, idestatusregistro, -- outsourcing,idempresaoutsourcing,quien,cuando)
        case empresa when 'RH' then 'S' else 'N' end as outsourcing,
        case empresa when 'RH' then 1 else null end as idempresa,
        'emireles', fn_fecha_actual()
from tmpestadofuerzaexcel;

commit;

select * from empleado;
select * from empleadoadscripcion;

select * from estadocivil;

update estadocivil set descestadocivil='SIN DATO' where idestadocivil=1;
update estadocivil set descestadocivil='SOLTERO' where idestadocivil=6;
commit;

select * from cliente;
select * from formatolegal;
select fn_fechaletra_largo(now());

select concat_ws(' ', e.nombre, ifnull(e.apellidopaterno,''), ifnull(e.apellidomaterno,'')) as nombre_empleado,
		fn_fechaletra_largo(ea.fechaadscripcion) as fecha_letra,
        concat(c.nombre,'/',a.descadscripcion) as nombre_obra,
        concat(m.descmunicipio,', ', es.descestado) as ubicacion_obra
from empleadoadscripcion ea
	inner join empleado e on e.idempleado=ea.idempleado
    inner join adscripcion a on a.idadscripcion=ea.idadscripcion
    inner join cliente c on c.idcliente=ea.idcliente
    inner join estado es on es.idestado=a.idestado
    inner join municipio m on m.idestado=a.idestado and m.idmunicipio=a.idmunicipio
where ea.idempleadoadscripcion=25;

select * from oficinanegocio;

insert into oficinanegocio(idoficinanegocio, nombrecomercial, representantelegal, sexorepresentantelegal, quien, cuando)
values(1, 'KATSA PROTECTIVE SOLUTIONS, S.A. DE C.V.', 'FRANCISCO JESÚS PLATA ANDRADE', 'M', 'emireles', fn_fecha_actual());
commit;

update oficinanegocio set
	calle='CALLE PRIMERA DIAGONAL NORTE',
    numeroext='1328',
    colonia='FRACCIONAMIENTO LOS ARCOS',
    ciudad='CIUDAD VICTORIA',
    codigopostal=87050,
    idestado=28, idmunicipio=41
where idoficinanegocio=1;

select concat_ws(', ',calle, concat('NUMERO ',numeroext), colonia, ciudad, edo.descestado) as domicilio_empresa 
from oficinanegocio ofna
	inner join estado edo on edo.idestado=ofna.idestado
where idoficinanegocio=1;

--   entrecalles          varchar(100),
--   colonia              varchar(50),
--   ciudad               varchar(50),
--   idmunicipio          smallint not null,
--   idestado             smallint not null,
--            int,
/*
			concat_ws(' ', tv.desctipovialidad, ce.calle, 
				
			concat_ws(' ', ta.desctipoasentamiento, ce.colonia) as colonia, ce.ciudad, e.descestado, ifnull(ce.codigopostal,0), 
*/            
select concat_ws(' ', e.nombre, ifnull(e.apellidopaterno,''), ifnull(e.apellidomaterno,'')) as nombre_empleado,
		ifnull(n.descnacionalidad,'SIN DATO') as nacionalidad,
        case e.sexo when 'M' then 'MASCULINO' else 'FEMENINO' end as sexo,
        if(e.fechanacimiento is null,'SIN DATO',fn_edad_anios(e.fechanacimiento)) as edad,
		ifnull(e.rfc,'SIN DATO') as rfc, ifnull(e.numimss,'SIN DATO') as numimss, ifnull(e.curp,'SIN DATO') as curp,
        concat(ifnull(e.calle,''),
			if(isnull(e.numexterior),'',concat_ws(' ',' NUM.',e.numexterior)),
            if(isnull(e.numinterior), '', 	concat_ws(' ',' INT.',e.numinterior)),
            if(isnull(e.entrecalles),'',concat_ws(' ',', ENTRE',e.entrecalles)),', ',
            ifnull(e.colonia,''),', ',
            if(isnull(e.codigopostal),'',concat_ws(' ','CODIGO POSTAL',e.codigopostal)),', ',
            ifnull(e.ciudad,''),', ',
            ifnull(edo.descestado,'')
        ) as domicilio_empleado
from empleadocontrato ec
		inner join empleado e on e.idempleado=ec.idempleado
        left outer join nacionalidad n on n.idnacionalidad=e.idnacionalidad
        left outer join estado edo on edo.idestado=e.idestado
where ec.idempleadocontrato=3;
-- PRIVADA NIÑOS HEROES NUM. 2675 INT. A, ENTRE VENUSTIANO CARRANZA Y PINO SUAREZ, FRACC. ARBOLEDAS, CODIGO POSTAL 87078, CD. VICTORIA, TAMAULIPAS


call sp_fmt_cambioadscripcion(25);

select * from formatolegal;

insert into formatolegal(claveformato, nombreformatolegal, contenido, margensuperior, margeninferior, margenizquierdo, margenderecho, storeprocedure, quien, cuando)
select '02', 'CONTRATO', contenido, margensuperior, margeninferior, margenizquierdo, margenderecho, 'sp_fmt_contrato', 'emireles', fn_fecha_actual()
from formatolegal
where idformatolegal=1;

commit;

select * from empleado
order by idempleado desc;
-- 129

call sp_empleadoreferencia_ups(0, 129, 1, 'JUAN GARCIA', null, null, null, 28, null, null, null, 'N', 'emireles', @last_id);

select * from tipodocumento;
select * from empleadodocumento;

select * from estatus;

insert into estatus(idestatus, descestatus, modulo, quien, cuando)
values(6,'ACTIVO','VEH','emireles',fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando)
values(7,'BAJA','VEH','emireles',fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando)
values(8,'MANTENIMIENTO','VEH','emireles',fn_fecha_actual());
commit;

select * from empleadocontrato;
call sp_fmt_contrato(3);


select fn_periodocontrato('M');
	


-- ----------------------------------------------------------------------------------------------------------------
-- Marcas de Vehiculos
-- ----------------------------------------------------------------------------------------------------------------
  
select * from marcavehiculo;

insert into marcavehiculo(idmarcavehiculo, descmarcavehiculo, quien, cuando)
values(1, 'NISSAN', 'emireles', fn_fecha_actual());

insert into marcavehiculo(idmarcavehiculo, descmarcavehiculo, quien, cuando)
values(2, 'TOYOTA', 'emireles', fn_fecha_actual());

insert into marcavehiculo(idmarcavehiculo, descmarcavehiculo, quien, cuando)
values(3, 'FORD', 'emireles', fn_fecha_actual());

insert into marcavehiculo(idmarcavehiculo, descmarcavehiculo, quien, cuando)
values(4, 'CHEVROLET', 'emireles', fn_fecha_actual());

insert into marcavehiculo(idmarcavehiculo, descmarcavehiculo, quien, cuando)
values(5, 'RENAULT', 'emireles', fn_fecha_actual());

insert into marcavehiculo(idmarcavehiculo, descmarcavehiculo, quien, cuando)
values(6, 'HONDA', 'emireles', fn_fecha_actual());

commit;  

-- ----------------------------------------------------------------------------------------------------------------
-- Tipos de Combustible
-- ----------------------------------------------------------------------------------------------------------------

select * from tipocombustible;

insert into tipocombustible(idtipocombustible, desctipocombustible, quien, cuando)
values(1, 'GASOLINA MAGNA', 'emireles', fn_fecha_actual());

insert into tipocombustible(idtipocombustible, desctipocombustible, quien, cuando)
values(2, 'GASOLINA PREMIUM', 'emireles', fn_fecha_actual());

insert into tipocombustible(idtipocombustible, desctipocombustible, quien, cuando)
values(3, 'DIESEL', 'emireles', fn_fecha_actual());

commit;


-- ----------------------------------------------------------------------------------------------------------------
-- Arrendadora
-- ----------------------------------------------------------------------------------------------------------------

select * from arrendadora;

insert into arrendadora(idarrendadora,nombre,idmunicipio,idestado,quien,cuando)
values(1,'GABRIEL GARZA',41,28,'emireles',fn_fecha_actual());

insert into arrendadora(idarrendadora,nombre,idmunicipio,idestado,quien,cuando)
values(2,'EXCELLENCE',41,28,'emireles',fn_fecha_actual());

insert into arrendadora(idarrendadora,nombre,idmunicipio,idestado,quien,cuando)
values(3,'RODRIGO SALAS',41,28,'emireles',fn_fecha_actual());

insert into arrendadora(idarrendadora,nombre,idmunicipio,idestado,quien,cuando)
values(4,'CARLOS CAVAZOS',41,28,'emireles',fn_fecha_actual());

commit;


insert into tipoincidenciaveh(idtipoincidenciaveh,desctipoincidenciaveh,quien,cuando)
values(1,'LLANTA PONCHADA','emireles',fn_fecha_actual());

insert into tipoincidenciaveh(idtipoincidenciaveh,desctipoincidenciaveh,quien,cuando)
values(2,'COFRE DAÑADO','emireles',fn_fecha_actual());

insert into tipoincidenciaveh(idtipoincidenciaveh,desctipoincidenciaveh,quien,cuando)
values(3,'VEHICULO ACCIDENTADO','emireles',fn_fecha_actual());

insert into tipoincidenciaveh(idtipoincidenciaveh,desctipoincidenciaveh,quien,cuando)
values(4,'PINTURA DAÑADA','emireles',fn_fecha_actual());

insert into tipoincidenciaveh(idtipoincidenciaveh,desctipoincidenciaveh,quien,cuando)
values(5,'TAPICERIA DAÑADA','emireles',fn_fecha_actual());

commit;

select * from tipoincidenciaveh;

call sp_vehiculoincidencia_all(1);

select * from aseguradora;

insert into aseguradora(idaseguradora,descaseguradora,quien,cuando)
values(1,'QUALITAS','emireles',fn_fecha_actual());

insert into aseguradora(idaseguradora,descaseguradora,quien,cuando)
values(2,'TEPEYAC','emireles',fn_fecha_actual());

commit;


select * from tarjetacombustible;

insert into tarjetacombustible(idtarjetacombustible, numtarjeta, idempleadoresguardo, fecharesguardo, quien, cuando)
values(2, 2964516, 14, fn_fecha_actual(), 'emireles', fn_fecha_actual());

select * from empleado;
select * from vehiculo;

select * from vehiculomantenimiento;

insert into vehiculomantenimiento(idvehiculo, fecha, kilometrajeactual, descservicio, tallermecanico, importetotal, quien, cuando)
values(4, fn_fecha_actual(), 16750, 'MANTENIMIENTO 15 MIL KMS', 'AGENCIA', 2300, 'emireles', fn_fecha_actual());

commit;

select * from tipoincidenciaveh;

select * from vehiculoincidencia;

insert into vehiculoincidencia(idvehiculo, fechaincidencia, idtipoincidenciaveh, idempleadoregistra, fecharegistro, observaciones, quien, cuando)
values(4, fn_fecha_actual(), 2, 17, fn_fecha_actual(), 'ALTA VELOCIDAD', 'emireles', fn_fecha_actual());

commit;

select * from vehiculopoliza;

insert into vehiculopoliza(idvehiculo, idaseguradora, numpoliza, iniciovigencia, finalvigencia, fechapago, importetotal, observaciones, quien, cuando)
values(7, 1, 'A2678341', '2020-01-01', '2020-12-31', fn_fecha_actual(), 10500, 'COBERTURA AMPLIA', 'emireles', fn_fecha_actual());

commit;

select * from vehiculotenencia;

insert into vehiculotenencia(idvehiculo, fechapago, importepagado, fechavigencia, placas, quien, cuando)
values(7, '2020-03-31', 1200, '2020-12-31', 'ABC9823', 'emireles', fn_fecha_actual());

commit;

select * from unidadmedida;

insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('PIEZA','PZA','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('PAQUETE','PQT','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('BOLSA','BOLSA','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('KILOGRAMOS','KG','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('BULTOS','BULTO','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('LITROS','LTS','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('BOTELLA','BOTE','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('CAJA','CAJA','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('METRO','MTS','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('SERVICIO','SERV','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('PARES','PAR','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('BLOCK','BLOCK','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('HORA','HRS','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('DÍA','DÍA','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('HOJA','HOJA','emireles', fn_fecha_actual());
insert into unidadmedida(descunidadmedida, nombrecorto, quien, cuando) values('MILLAR','MIL','emireles', fn_fecha_actual());
commit;


select * from partida;

insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ACCESORIOS Y EQUIPO DE COMPUTO','00101','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ACCS. DE RADIO COMUNICACION','00102','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('AGUA','00104','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ALIMENTACION','00150','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ALIMENTACION PARA OFICIALES','00000','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ARRENDAMIENTO','00105','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ASESORIA FISCAL','00108','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ASESORIA SISTEMAS','00107','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ASESORIA TECNICA Y ESPECIALIZADA','00143','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ATENCIÓN A CLIENTES','00109','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CALZADO','00063','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CAMISAS','00050','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CHAMARRAS','00073','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('COMBUSTIBLES','00110','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('COMISION POR AUTOFINANCIAMIENTO','00146','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('COMISIONES BANCARIAS','00138','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CONSTRUCCIONES','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CORBATAS','00053','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CUELLERAS','00052','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CUOTAS Y SUSCRIPCIONES','00136','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('CURSOS DE CAPACITACION','00111','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EDIFICIO','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EQUIPO DE COMPUTO','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EQUIPO DE COMUNICACION','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EQUIPO DE OFICINA','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EQUIPO DE SEGURIDAD','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EQUIPO DE TRABAJO','00140','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('EQUIPO DE TRANSPORTE','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('ESPOSAS','00056','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('FORNITURAS','00055','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASES','00057','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS DE CAPACITACION','00112','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS DE HOSPEDAJE','00144','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS DE INTEGRACION','00072','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS DE RECLUTAMIENTO','00149','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS DE VIAJE','00113','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS POR COMPROBAR','00151','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('GASTOS POR COMPROBAR','00085','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('HONORARIOS','00114','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('HONORARIOS POR ASESORIA','00082','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('IMPRENTA','00115','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('INTERESES FINANCIEROS','00137','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('INTERESES POR AUTOFINANCIAMIENTO','00148','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('LAMPARAS','00060','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('LAVADO DE UNIFORMES','00145','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('LIMPIEZA','00106','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('LIMPIEZA','00000','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('LUZ ELECTRICA','00117','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MAQUINARIA Y EQUIPO','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MEJORAS A LOCALES ARRENDADOS','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MENSAJERIA','00118','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MOBILIARIO Y EQUIPO','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MOBILIARIO Y EQUIPO','00000','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO DE MOB Y EQUIPO','00142','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO DE UNIFORMES','00066','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO EQUIPO DE OFICINA','00139','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO POR DAÑOS AL INMUEBLE','00081','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO Y ACC DE RADIOCOMUNICACION','00080','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO. DE LOCAL','00119','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO. DE RADIO COMUNICACION','00120','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MTTO. EQ. DE TRANSPORTE','00121','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('MULTAS','00122','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('OTROS GASTOS','00086','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('OTROS IMPUESTOS','00141','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PANTALON','00051','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PAPELERIA','00125','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PAPELERIA','00000','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PLAYERAS Y GORRAS','00065','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PORTARADIOS','00075','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PREVISION SOCIAL','00126','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('PUBLICIDAD','00127','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('RECARGOS','00128','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('RENTA EQUIPO DE TRABAJO','00134','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SEGUROS Y FIANZAS','00129','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SERVICIO TECNICO DE SISTEMAS','00061','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SERVICIOS DE LABORATORIO','00130','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SERVICIOS DE LIMPIEZA','00083','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SISTEMAS DE MONITOREO','00084','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SISTEMAS DE MONITOREO','01000','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('SISTEMAS SOFTWARE','00131','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('TELEFONO','00132','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('TENENCIAS Y DERECHOS','00133','G','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('TERRENO','00000','I','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('TOLETES','00058','C','emireles',fn_fecha_actual());
insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando) values('UNIFORMES ADMINISTRATIVOS','00135','G','emireles',fn_fecha_actual());
commit;


-- SQL Server -> cymez
select 'insert into articulo(codigoarticulo,descarticulo,descarticuloprov,idunidadmedida,preciocompra,idpartidagto) values(' +
		char(39)+CodigoArticulo+char(39)+','+char(39)+NombreArticulo+char(39)+','''+isnull(DescArticulo,'')+char(39)+','+
		convert(varchar,idunidadmedida)+','+convert(varchar,isnull(ultimocosto,0))+','+convert(varchar,isnull(idpartidagto,0))+');' as query
from Articulo
where codigoarticulo is not null
and CodigoArticulo <> ''
and isnull(idpartidagto,0) between 1 and 85;

-- -----------------------------------------------------------------------------------------------------------------------------------

select * from estatus;

insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(9, 'SOLICITUD', 'REQ', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(10, 'REVISADO', 'REQ', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(11, 'AUTORIZADO', 'REQ', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(12, 'RECHAZADO', 'REQ', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(13, 'CANCELADO', 'REQ', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(14, 'ORDEN COMPRA', 'REQ', 'emireles', fn_fecha_actual());
commit;

insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(15, 'SOLICITUD', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(16, 'REVISADO', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(17, 'AUTORIZADO', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(18, 'RECHAZADO', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(19, 'CANCELADO', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(20, 'ENTREGADO', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(21, 'COMPROBADO', 'GTS', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(22, 'CONCILIADO', 'GTS', 'emireles', fn_fecha_actual());
commit;

insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(23, 'PREORDEN', 'ORD', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(24, 'PEDIDO', 'ORD', 'emireles', fn_fecha_actual());
insert into estatus(idestatus, descestatus, modulo, quien, cuando) values(25, 'FACTURADO', 'ORD', 'emireles', fn_fecha_actual());
commit;


select max(menuid) from menu;
-- 64

select * from menu
where menuid=padreid
order by posicion;

select * from menu
where padreid=28 and menuid != padreid
order by posicion;

insert into menu(menuid, nombremenu, padreid, posicion, habilitado, url, ordenmenu) 
values(68, 'TIPOS DE SALIDAS INVENTARIO', 28, 17, 1, null, '011700');

update menu set posicion=10, ordenmenu='031000' where menuid=64;
update menu set posicion=11, ordenmenu='031100' where menuid=36;
update menu set url='../CuentasBancarias/index.php' where menuid=57;

commit;


update vehiculogasolina set fecha='2020-12-05'
where idvehiculogasolina in (2,3,4);

commit;

call sp_rptvehiculotenencia('2020-01-01', '2020-12-31');

select gcd.idgastoscomprobardetalle, p.descpartida
from gastoscomprobardetalle gcd
	inner join partida p on p.idpartida=gcd.idpartida
where idgastoscomprobar=1
order by p.descpartida;
			
select * from usuario;
delete from usuariomenu where idusuario=2;
delete from usuario where idusuario=2;
commit;

select * from usuariomenu
where idusuario=2;

select * from empleado
where nombrecompleto like '%LIZ%';

select * from estatus
where modulo='ORD';

select * from region;
select * from almacen;

insert into almacen(idalmacen, idregion, descalmacen, quien, cuando)
values(1, 2, 'ALMACEN VICTORIA', 'emireles', fn_fecha_actual());

insert into almacen(idalmacen, idregion, descalmacen, quien, cuando)
values(2, 3, 'ALMACEN REYNOSA', 'emireles', fn_fecha_actual());

commit;

	select 	oc.idproveedor, ocf.fechafactura, oc.folio, ocd.idarticulo, ocd.cantidad, ocd.importe
	from ordencompradetalle ocd
		inner join ordencompra oc on oc.idordencompra=ocd.idordencompra
		inner join ordencomprafactura ocf on ocf.idordencompra=ocd.idordencompra
	where ocd.idordencompra=1;

select * from ordencompra
where idordencompra=1;

insert into ordencomprafactura(idordencompra,fechafactura,idproveedor,tipoventa,idformapago,referenciapago,diascredito,
					fechavencimiento,importetotal,uuid,nombrearchivoxml,nombrearchivopdf,observaciones,quien,cuando)
values(1,'2020-12-15',1,'P',1,'',15,'2020-12-31',500,'ABC-123','nombrearchivoxml','nombrearchivopdf','observaciones','emireles',fn_fecha_actual());

commit;

-- 1	2020-12-15 00:00:00	202011-00001	956	15	116.25
-- 1	2020-12-15 00:00:00	202011-00001	450	25	121.00
-- 1	2020-12-15 00:00:00	202011-00001	689	25	123.93
-- 1	2020-12-15 00:00:00	202011-00001	710	15	47.75

select * from gastoscomprobar;
select * from gastoscomprobardetalle;
select * from gastoscomprobarfactura;

call sp_gastoscomprobar_all(1,3,130,2020,12,'C');
call sp_gastoscomprobarfactura_all(22);

update gastoscomprobarfactura set idgastoscomprobardetalle = 12
where idgastoscomprobarfactura in (3,4);

commit;

select * from inventario;
select * from salidainventario;
call sp_salidainventario_ins(1,1,130,'PRIMERA SALIDA',0.0,'emireles',@last_id);
call sp_salidainventariodetalle_ins(1,450,10,121.00,1210.00,'emireles',@last_id);
