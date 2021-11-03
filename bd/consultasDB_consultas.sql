USE `dpto_punto_com`;
/*
Registrar un usuario
*/

INSERT INTO `usuario` VALUES(1, 'Juan', 'Lopez', '1900-11-02', 3535353, 'juan.lopez@gmail.com', '123456');
INSERT INTO `usuario` VALUES(2, 'Florencia', 'Bonelli', '2000-12-21', 45454545, 'florencia.bonelli@gmail.com', 'flor123');

/*
Insertando datos en todas las tables.
*/

INSERT INTO `tipo_propiedad` VALUES(1, 'departamentos'), (2, 'casas'), (3, 'pensiones'), (4, 'residencias');
INSERT INTO `tipo_operacion` VALUES(1, 'temporal'), (2, 'permanente');
INSERT INTO `tipo_vendedor` VALUES(1, 'dueño'), (2, 'inmobiliaria');
INSERT INTO `localidad` VALUES(1, 'cordoba', 'cordoba'), (2, 'carlos paz', 'cordoba'), (3, 'alta gracia', 'cordoba'), (4, 'rio cuarto', 'cordoba');
INSERT INTO `domicilio` VALUES(1, ' tomas espora', 913, null, null, 1);
/*
Buscar un usuario especifico
*/
SELECT * FROM USUARIO WHERE nombre='juan' AND contraseña='123456';

/*
Actividad principal -  Realizar una publicacion
*/
INSERT INTO `publicacion` VALUES(1, '2021-11-02', 1, 1, 12000, 1, 1, 1, 1, 2); 
INSERT INTO `publicacion` VALUES(2, '2021-11-02', 1, 1, 23000, 1, 3, 2, 1, 2); 
INSERT INTO `publicacion` VALUES(3, '2021-12-02', 1, 1, 1000.0, 1, 2, 2, 1, 2);

/*
Editar un item especifico de mi actividad principal
*/
UPDATE `publicacion` SET precio=13000 WHERE id_publicacion=1;

/*
Editar un item especifico de un grupo de registros de la actividad principal
*/
UPDATE `publicacion` SET precio=20000 WHERE id_publicacion IN (1, 2);

/*
Eliminar un item especifico.
*/
DELETE FROM `usuario` WHERE nombre='Juan';