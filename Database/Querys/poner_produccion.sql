ALTER TABLE menu
ADD es_reporte smallint DEFAULT 0;

INSERT INTO menu(menuid, nombremenu, padreid, posicion, icono, habilitado, url, ordenmenu, es_reporte)
VALUES (73, 'REPORTES VEHICULOS',73,0,0,1,'','010000',1)

INSERT INTO menu(menuid, nombremenu, padreid, posicion, icono, habilitado, url, ordenmenu, es_reporte)
VALUES (74, 'PADRON VEHICULAR',73,1,0,1,'','010100',1)

INSERT INTO menu(menuid, nombremenu, padreid, posicion, icono, habilitado, url, ordenmenu, es_reporte)
VALUES (75, 'REPORTES',1,4,0,1,'../Reportes/index.php','100400',0)

commit;
