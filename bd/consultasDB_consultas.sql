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