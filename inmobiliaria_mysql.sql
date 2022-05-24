-- Crear base de datos inmobiliaria --
CREATE DATABASE azteca;

-- Usar base da datos inmobiliaria --
USE azteca;

-- Crear tabla empleados --

CREATE TABLE empleados (
 id_empleado INT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 usuario VARCHAR(12) NOT NULL,
 contrasena VARCHAR(50) NOT NULL,
 nombre VARCHAR(20) NOT NULL,
 apellidos VARCHAR(50) NOT NULL,
 dni VARCHAR(9) NOT NULL,
 email VARCHAR(125) NOT NULL,
 telefono INT(9) NOT NULL,
 UNIQUE (usuario)
);

-- Crear tabla administradores --

CREATE TABLE administradores (
 id_admin INT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 usuario VARCHAR(12) NOT NULL,
 contrasena VARCHAR(50) NOT NULL,
 nombre VARCHAR(20) NOT NULL,
 apellidos VARCHAR(50) NOT NULL,
 dni VARCHAR(9) NOT NULL,
 email VARCHAR(125) NOT NULL,
 telefono INT(9) NOT NULL,
 UNIQUE (usuario)
);

-- Crear tabla clientes --

CREATE TABLE clientes (
 id_cliente INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 usuario VARCHAR(12) NOT NULL,
 contrasena VARCHAR(50) NOT NULL,
 nombre VARCHAR(20) NOT NULL,
 apellidos VARCHAR(50) NOT NULL,
 dni VARCHAR(9) NOT NULL,
 email VARCHAR(125) NOT NULL,
 telefono INT(9) NOT NULL,
 UNIQUE (usuario)
);

-- Crear tabla garajes --

CREATE TABLE garajes (
 id_garaje INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 descripcion TEXT,
 metros INT(4) NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 planta INT(1) NOT NULL,
 numero INT(1) NOT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- Crear tabla casas --

CREATE TABLE casas (
 id_casa INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 descripcion TEXT,
 metros INT(4) NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 garaje INT(6) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (garaje) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- Crear tabla pisos --

CREATE TABLE pisos (
 id_piso INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 descripcion TEXT,
 metros INT(4) NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 planta INT(1) NOT NULL,
 puerta VARCHAR(1) NOT NULL,
 garaje INT(6) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (garaje) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- Crear tabla locales --

CREATE TABLE locales (
 id_local INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 descripcion TEXT,
 metros INT(4) NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 servicio VARCHAR(20) NOT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- Crear tabla imagen_casas --

CREATE TABLE imagen_casas (
 id_imagen_casa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 archivo VARCHAR(20) NOT NULL,
 casa INT(6) DEFAULT NULL,
 FOREIGN KEY (casa) REFERENCES casas(id_casa) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Crear tabla imagen_pisos --

CREATE TABLE imagen_pisos (
 id_imagen_piso INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 archivo VARCHAR(20) NOT NULL,
 piso INT(6) DEFAULT NULL,
 FOREIGN KEY (piso) REFERENCES pisos(id_piso) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Crear tabla imagen_locales --

CREATE TABLE imagen_locales (
 id_imagen_local INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 archivo VARCHAR(20) NOT NULL,
 local INT(6) DEFAULT NULL,
 FOREIGN KEY (local) REFERENCES locales(id_local) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Crear tabla imagen_garajes --

CREATE TABLE imagen_garajes (
 id_imagen_garaje INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 archivo VARCHAR(20) NOT NULL,
 garaje INT(6) DEFAULT NULL,
 FOREIGN KEY (garaje) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Crear tabla compras, alquileres y pagos de casas --

CREATE TABLE compras_casas (
 id_compra_casa INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 valor INT(8) NOT NULL,
 fecha DATE NOT NULL,
 edificio INT(6) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES casas(id_casa) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE alquiler_casas (
 id_alquiler_casa INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 edificio INT(6) DEFAULT NULL,
 agente INT(2) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES casas(id_casa) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);

 
CREATE TABLE pagos_casas (
 id_pago_casa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 fecha DATE NOT NULL,
 valor INT(4) NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_casas(id_alquiler_casa) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Crear tabla compras, alquileres y pagos de pisos --

CREATE TABLE compras_pisos (
 id_compra_piso INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 valor INT(8) NOT NULL,
 fecha DATE NOT NULL,
 edificio INT(6) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES pisos(id_piso) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE alquiler_pisos (
 id_alquiler_piso INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 edificio INT(6) DEFAULT NULL,
 agente INT(2) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES pisos(id_piso) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE pagos_pisos (
 id_pago_piso INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 fecha DATE NOT NULL,
 valor INT(4) NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_pisos(id_alquiler_piso) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Crear tabla compras, alquileres y pagos de locales --

CREATE TABLE compras_locales (
 id_compra_local INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 valor INT(8) NOT NULL,
 fecha DATE NOT NULL,
 edificio INT(6) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES locales(id_local) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE alquiler_locales (
 id_alquiler_local INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 edificio INT(6) DEFAULT NULL,
 agente INT(2) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES locales(id_local) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);

 
CREATE TABLE pagos_locales (
 id_pago_local INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 fecha DATE NOT NULL,
 valor INT(4) NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_locales(id_alquiler_local) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Crear tabla compras, alquileres y pagos de garajes --

CREATE TABLE compras_garajes (
 id_compra_garaje INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 valor INT(8) NOT NULL,
 fecha DATE NOT NULL,
 edificio INT(6) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE alquiler_garajes (
 id_alquiler_garaje INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 edificio INT(6) DEFAULT NULL,
 agente INT(2) DEFAULT NULL,
 cliente INT(4) DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);

 
CREATE TABLE pagos_garajes (
 id_pago_garaje INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 fecha DATE NOT NULL,
 valor INT(4) NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_garajes(id_alquiler_garaje) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Insertar usuario administrador --

INSERT INTO administradores (usuario, contrasena, nombre, apellidos, dni, email, telefono) VALUES ("admin", MD5("inves"), "Administrador", "Azteca", "Ninguno", "admin@azteca.com", 912303030);

-- Insertar usuario miguel como empleado --

INSERT INTO empleados (usuario, contrasena, nombre, apellidos, dni, email, telefono) VALUES ("empleado_ma", MD5("inves"), "Miguel Angel", "Gallego", "52320123R", "empleado_miguel@azteca.com", 612340129);

-- Creación de usuarios --
-- Administrador --
GRANT ALL PRIVILEGES ON azteca.* TO admin@localhost IDENTIFIED BY "inves";

-- Jefe de los empleados --
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.empleados TO jefe_empleado@192.168.70.20 IDENTIFIED BY "inves";
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.casas TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.pisos TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.locales TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.garajes TO jefe_empleado@192.168.70.20;

GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.alquiler_casas TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.pagos_casas TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.alquiler_pisos TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.pagos_pisos TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.alquiler_locales TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.pagos_locales TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.alquiler_garajes TO jefe_empleado@192.168.70.20;
GRANT SELECT, INSERT, UPDATE, DELETE ON azteca.pagos_garajes TO jefe_empleado@192.168.70.20;

-- Empleados --
GRANT SELECT, INSERT ON azteca.casas TO empleado1 IDENTIFIED BY "inves";
GRANT SELECT, INSERT ON azteca.pisos TO empleado1;
GRANT SELECT, INSERT ON azteca.locales TO empleado1;
GRANT SELECT, INSERT ON azteca.garajes TO empleado1;

GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_casas TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_casas TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_pisos TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_pisos TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_locales TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_locales TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_garajes TO empleado1;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_garajes TO empleado1;

GRANT SELECT, INSERT ON azteca.casas TO empleado2 IDENTIFIED BY "inves";
GRANT SELECT, INSERT ON azteca.pisos TO empleado2;
GRANT SELECT, INSERT ON azteca.locales TO empleado2;
GRANT SELECT, INSERT ON azteca.garajes TO empleado2;

GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_casas TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_casas TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_pisos TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_pisos TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_locales TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_locales TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.alquiler_garajes TO empleado2;
GRANT SELECT, INSERT, UPDATE ON azteca.pagos_garajes TO empleado2;

-- Funciones --

-- Funcion de sumar el total de dinero recaudado con los alquileres --

DROP FUNCTION IF EXISTS sumatodopagos;
DELIMITER //
CREATE FUNCTION sumatodopagos() RETURNS INTEGER
BEGIN
DECLARE casas INTEGER DEFAULT 0;
DECLARE pisos INTEGER DEFAULT 0;
DECLARE locales INTEGER DEFAULT 0;
DECLARE garajes INTEGER DEFAULT 0;
DECLARE resultado INTEGER DEFAULT 0;
SELECT SUM(valor) FROM pagos_casas INTO casas;
SELECT SUM(valor) FROM pagos_pisos INTO pisos;
SELECT SUM(valor) FROM pagos_locales INTO locales;
SELECT SUM(valor) FROM pagos_garajes INTO garajes;
SELECT SUM(casas + pisos + locales + garajes) INTO resultado;
RETURN resultado;
END//
DELIMITER ;
SELECT sumatodopagos();

-- Funcion de sumar todas las compras de las casas, piso, locales y garajes --

DROP FUNCTION IF EXISTS sumatodocompras;
DELIMITER //
CREATE FUNCTION sumatodocompras() RETURNS INTEGER
BEGIN
DECLARE casas INTEGER DEFAULT 0;
DECLARE pisos INTEGER DEFAULT 0;
DECLARE locales INTEGER DEFAULT 0;
DECLARE garajes INTEGER DEFAULT 0;
DECLARE resultado INTEGER DEFAULT 0;
SELECT SUM(valor) FROM compras_casas INTO casas;
SELECT SUM(valor) FROM compras_pisos INTO pisos;
SELECT SUM(valor) FROM compras_locales INTO locales;
SELECT SUM(valor) FROM compras_garajes INTO garajes;
SELECT SUM(casas + pisos + locales + garajes) INTO resultado;
RETURN resultado;
END//
DELIMITER ;
SELECT sumatodocompras();

-- Funcion sumar todo lo recaudado --

DROP FUNCTION IF EXISTS sumatodo;
DELIMITER //
CREATE FUNCTION sumatodo() RETURNS INTEGER
BEGIN
DECLARE resultado INTEGER DEFAULT 0;
SELECT SUM(sumatodopagos() + sumatodocompras()) INTO resultado;
RETURN resultado;
END//
DELIMITER ;
SELECT sumatodo();

-- Procedimientos --

-- Procedimiento que se introduce la funcion sumatodopagos como parametro de entrada y muestra el total de pagos con el impuesto incluido --

DROP PROCEDURE IF EXISTS impuesto_pago;
DELIMITER //
CREATE PROCEDURE impuesto_pago(IN valor INT)
BEGIN
 DECLARE operacion INT;
 DECLARE resultado INT;
 SET operacion=valor*0.21;
 SET resultado=valor - operacion;
 SELECT resultado;
END//
DELIMITER ;
CALL impuesto_pago(sumatodopagos());

-- Procedimiento que se introduce la funcion sumatodocompras como parametro de entrada y muestra el total de compras con el impuesto incluido --

DROP PROCEDURE IF EXISTS impuesto_compra;
DELIMITER //
CREATE PROCEDURE impuesto_compra(IN valor INT)
BEGIN
 DECLARE operacion INT;
 DECLARE resultado INT;
 SET operacion=valor*0.21;
 SET resultado=valor - operacion;
 SELECT resultado;
END//
DELIMITER ;
CALL impuesto_compra(sumatodocompras());

-- Cursores --
-- Sacar el valor total de pagos del alquiler mas caro de la casa--
DROP PROCEDURE IF EXISTS sumapagocasa;
DELIMITER //
CREATE PROCEDURE sumapagocasa()
BEGIN
 DECLARE seguir BOOLEAN DEFAULT TRUE;
 DECLARE miid INT DEFAULT 0;
 DECLARE midireccion TEXT DEFAULT 0;
 DECLARE mimetros INT DEFAULT 0;
 DECLARE mivalor INT DEFAULT 0;
 DECLARE maxid INT DEFAULT 0;
 DECLARE maxdireccion TEXT DEFAULT 0;
 DECLARE maxmetros INT DEFAULT 0;
 DECLARE maxvalor INT DEFAULT 0;
 DECLARE cursormaxpagos CURSOR FOR SELECT id_casa, direccion, metros, (SELECT sum(valor) FROM pagos_casas WHERE pagos_casas.alquiler=casas.id_casa) AS "Valor total" FROM casas GROUP BY id_casa;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET seguir=FALSE;
 OPEN cursormaxpagos;
  WHILE seguir DO
   FETCH cursormaxpagos INTO miid, midireccion, mimetros, mivalor;
    IF seguir THEN
	 IF mivalor>maxvalor THEN
	  SET maxid=miid;
	  SET maxdireccion=midireccion;
	  SET maxmetros=mimetros;
	  SET maxvalor=mivalor;
	 END IF;
	END IF;
  END WHILE;
 CLOSE cursormaxpagos;
 SELECT CONCAT("La casa con ID ", maxid, " en la direccion ", maxdireccion, " con ", maxmetros, " metros cuadrados, tiene en total ", maxvalor, " en total de pagos") AS "Resultado";
END//
DELIMITER ;
CALL sumapagocasa();
-- Lo mismo pero para pisos --
DROP PROCEDURE IF EXISTS sumapagopiso;
DELIMITER //
CREATE PROCEDURE sumapagopiso()
BEGIN
 DECLARE seguir BOOLEAN DEFAULT TRUE;
 DECLARE miid INT DEFAULT 0;
 DECLARE midireccion TEXT DEFAULT 0;
 DECLARE mimetros INT DEFAULT 0;
 DECLARE miplanta INT(1) DEFAULT 0;
 DECLARE mipuerta VARCHAR(1) DEFAULT 0;
 DECLARE mivalor INT DEFAULT 0;
 DECLARE maxid INT DEFAULT 0;
 DECLARE maxdireccion TEXT DEFAULT 0;
 DECLARE maxmetros INT DEFAULT 0;
 DECLARE maxplanta INT(1) DEFAULT 0;
 DECLARE maxpuerta VARCHAR(1) DEFAULT 0;
 DECLARE maxvalor INT DEFAULT 0;
 DECLARE cursormaxpagos CURSOR FOR SELECT id_piso, direccion, metros, planta, puerta, (SELECT sum(valor) FROM pagos_pisos WHERE pagos_pisos.alquiler=pisos.id_piso) AS "Valor total" FROM pisos GROUP BY id_piso;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET seguir=FALSE;
 OPEN cursormaxpagos;
  WHILE seguir DO
   FETCH cursormaxpagos INTO miid, midireccion, mimetros, miplanta, mipuerta, mivalor;
    IF seguir THEN
	 IF mivalor>maxvalor THEN
	  SET maxid=miid;
	  SET maxdireccion=midireccion;
	  SET maxmetros=mimetros;
	  SET maxplanta=miplanta;
	  SET maxpuerta=mipuerta;
	  SET maxvalor=mivalor;
	 END IF;
	END IF;
  END WHILE;
 CLOSE cursormaxpagos;
SELECT CONCAT("El piso con ID ", maxid, " en la direccion ", maxdireccion, " con ", maxmetros, " metros cuadrados, con numero ", maxplanta, " y letra ", maxpuerta, " tiene en total ", maxvalor, " en total de pagos") AS "Resultado";
END//
DELIMITER ;
CALL sumapagopiso();
-- Lo mismo pero para locales --
DROP PROCEDURE IF EXISTS sumapagolocal;
DELIMITER //
CREATE PROCEDURE sumapagolocal()
BEGIN
 DECLARE seguir BOOLEAN DEFAULT TRUE;
 DECLARE miid INT DEFAULT 0;
 DECLARE midireccion TEXT DEFAULT 0;
 DECLARE mimetros INT DEFAULT 0;
 DECLARE miservicio VARCHAR(20) DEFAULT 0;
 DECLARE mivalor INT DEFAULT 0;
 DECLARE maxid INT DEFAULT 0;
 DECLARE maxdireccion TEXT DEFAULT 0;
 DECLARE maxmetros INT DEFAULT 0;
 DECLARE maxservicio VARCHAR(20) DEFAULT 0;
 DECLARE maxvalor INT DEFAULT 0;
 DECLARE cursormaxpagos CURSOR FOR SELECT id_local, direccion, metros, servicio,(SELECT sum(valor) FROM pagos_locales WHERE pagos_locales.alquiler=locales.id_local) AS "Valor total" FROM locales GROUP BY id_local;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET seguir=FALSE;
 OPEN cursormaxpagos;
  WHILE seguir DO
   FETCH cursormaxpagos INTO miid, midireccion, mimetros, miservicio, mivalor;
    IF seguir THEN
	 IF mivalor>maxvalor THEN
	  SET maxid=miid;
	  SET maxdireccion=midireccion;
	  SET maxmetros=mimetros;
	  SET maxservicio=miservicio;
	  SET maxvalor=mivalor;
	 END IF;
	END IF;
  END WHILE;
 CLOSE cursormaxpagos;
 SELECT CONCAT("El local con ID ", maxid, " en la direccion ", maxdireccion, " con ", maxmetros, " metros cuadrados, con servicio de ", maxservicio, " tiene en total ", maxvalor, " en total de pagos") AS "Resultado";
END//
DELIMITER ;
CALL sumapagolocal();
-- Lo mismo pero para garajes --
DROP PROCEDURE IF EXISTS sumapagogaraje;
DELIMITER //
CREATE PROCEDURE sumapagogaraje()
BEGIN
 DECLARE seguir BOOLEAN DEFAULT TRUE;
 DECLARE miid INT DEFAULT 0;
 DECLARE midireccion TEXT DEFAULT 0;
 DECLARE mimetros INT DEFAULT 0;
 DECLARE miplanta INT(1) DEFAULT 0;
 DECLARE minumero INT(1) DEFAULT 0;
 DECLARE mivalor INT DEFAULT 0;
 DECLARE maxid INT DEFAULT 0;
 DECLARE maxdireccion TEXT DEFAULT 0;
 DECLARE maxmetros INT DEFAULT 0;
 DECLARE maxplanta INT(1) DEFAULT 0;
 DECLARE maxnumero INT(1) DEFAULT 0;
 DECLARE maxvalor INT DEFAULT 0;
 DECLARE cursormaxpagos CURSOR FOR SELECT id_garaje, direccion, metros, planta, numero, (SELECT sum(valor) FROM pagos_garajes WHERE pagos_garajes.alquiler=garajes.id_garaje) AS "Valor total" FROM garajes GROUP BY id_garaje;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET seguir=FALSE;
 OPEN cursormaxpagos;
  WHILE seguir DO
   FETCH cursormaxpagos INTO miid, midireccion, mimetros, miplanta, minumero, mivalor;
    IF seguir THEN
	 IF mivalor>maxvalor THEN
	  SET maxid=miid;
	  SET maxdireccion=midireccion;
	  SET maxmetros=mimetros;
	  SET maxplanta=miplanta;
	  SET maxnumero=minumero;
	  SET maxvalor=mivalor;
	 END IF;
	END IF;
  END WHILE;
 CLOSE cursormaxpagos;
SELECT CONCAT("El garaje con ID ", maxid, " en la direccion ", maxdireccion, " con ", maxmetros, " metros cuadrados, con planta ", maxplanta, " y numero ", maxnumero, " tiene en total ", maxvalor, " en total de pagos") AS "Resultado";
END//
DELIMITER ;
CALL sumapagogaraje();