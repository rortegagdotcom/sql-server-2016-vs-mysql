CREATE DATABASE inmobiliaria
GO

USE inmobiliaria
GO

CREATE TABLE empleados (
 id_empleado INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 usuario VARCHAR(12) NOT NULL,
 contrasena VARCHAR(50) NOT NULL,
 nombre VARCHAR(20) NOT NULL,
 apellidos VARCHAR(50) NOT NULL,
 dni VARCHAR(9) NOT NULL,
 email VARCHAR(125) NOT NULL,
 telefono INT NOT NULL,
 UNIQUE (usuario)
)

CREATE TABLE administradores (
 id_admin INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 usuario VARCHAR(12) NOT NULL,
 contrasena VARCHAR(50) NOT NULL,
 nombre VARCHAR(20) NOT NULL,
 apellidos VARCHAR(50) NOT NULL,
 dni VARCHAR(9) NOT NULL,
 email VARCHAR(125) NOT NULL,
 telefono INT NOT NULL,
 UNIQUE (usuario)
)

CREATE TABLE clientes (
 id_cliente INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 usuario VARCHAR(12) NOT NULL,
 contrasena VARCHAR(50) NOT NULL,
 nombre VARCHAR(20) NOT NULL,
 apellidos VARCHAR(50) NOT NULL,
 dni VARCHAR(9) NOT NULL,
 email VARCHAR(125) NOT NULL,
 telefono INT NOT NULL,
 UNIQUE (usuario)
)

CREATE TABLE garajes (
 id_garaje INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 descripcion TEXT,
 metros INT NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 planta INT NOT NULL,
 numero INT NOT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE casas (
 id_casa INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 descripcion TEXT,
 metros INT NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 garaje INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (garaje) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE pisos (
 id_piso INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 descripcion TEXT,
 metros INT NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 planta INT NOT NULL,
 puerta VARCHAR(1) NOT NULL,
 garaje INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (garaje) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE locales (
 id_local INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 descripcion TEXT,
 metros INT NOT NULL,
 direccion VARCHAR(50) NOT NULL,
 servicio VARCHAR(20) NOT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE imagen_casas (
 id_imagen_casa INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 archivo VARCHAR(20) NOT NULL,
 casa INT DEFAULT NULL,
 FOREIGN KEY (casa) REFERENCES casas(id_casa) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE imagen_pisos (
 id_imagen_piso INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 archivo VARCHAR(20) NOT NULL,
 piso INT DEFAULT NULL,
 FOREIGN KEY (piso) REFERENCES pisos(id_piso) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE imagen_locales (
 id_imagen_local INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 archivo VARCHAR(20) NOT NULL,
 local INT DEFAULT NULL,
 FOREIGN KEY (local) REFERENCES locales(id_local) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE imagen_garajes (
 id_imagen_garaje INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 archivo VARCHAR(20) NOT NULL,
 garaje INT DEFAULT NULL,
 FOREIGN KEY (garaje) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE compras_casas (
 id_compra_casa INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 valor INT NOT NULL,
 fecha DATE NOT NULL,
 edificio INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES casas(id_casa) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE alquiler_casas (
 id_alquiler_casa INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 edificio INT DEFAULT NULL,
 agente INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES casas(id_casa) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)
 
CREATE TABLE pagos_casas (
 id_pago_casa INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 fecha DATE NOT NULL,
 valor INT NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_casas(id_alquiler_casa) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE compras_pisos (
 id_compra_piso INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 valor INT NOT NULL,
 fecha DATE NOT NULL,
 edificio INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES pisos(id_piso) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE alquiler_pisos (
 id_alquiler_piso INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 edificio INT DEFAULT NULL,
 agente INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES pisos(id_piso) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE pagos_pisos (
 id_pago_piso INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 fecha DATE NOT NULL,
 valor INT NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_pisos(id_alquiler_piso) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE compras_locales (
 id_compra_local INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 valor INT NOT NULL,
 fecha DATE NOT NULL,
 edificio INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES locales(id_local) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE alquiler_locales (
 id_alquiler_local INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 edificio INT DEFAULT NULL,
 agente INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES locales(id_local) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)
 
CREATE TABLE pagos_locales (
 id_pago_local INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 fecha DATE NOT NULL,
 valor INT NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_locales(id_alquiler_local) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE compras_garajes (
 id_compra_garaje INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 valor INT NOT NULL,
 fecha DATE NOT NULL,
 edificio INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE alquiler_garajes (
 id_alquiler_garaje INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 edificio INT DEFAULT NULL,
 agente INT DEFAULT NULL,
 cliente INT DEFAULT NULL,
 FOREIGN KEY (edificio) REFERENCES garajes(id_garaje) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (agente) REFERENCES empleados(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
)
 
CREATE TABLE pagos_garajes (
 id_pago_garaje INT NOT NULL PRIMARY KEY IDENTITY(1,1),
 fecha DATE NOT NULL,
 valor INT NOT NULL,
 alquiler INT NOT NULL,
 FOREIGN KEY (alquiler) REFERENCES alquiler_garajes(id_alquiler_garaje) ON UPDATE CASCADE ON DELETE CASCADE
)
GO

-- Insertar usuario administrador --

INSERT INTO administradores (usuario, contrasena, nombre, apellidos, dni, email, telefono) VALUES ("admin", CONVERT(VARCHAR(50), HASHBYTES('MD5', 'inves'), 2), "Administrador", "Azteca", "Ninguno", "admin@azteca.com", 912303030);
GO

-- Insertar usuario miguel como empleado --

INSERT INTO empleados (usuario, contrasena, nombre, apellidos, dni, email, telefono) VALUES ("empleado_ma", CONVERT(VARCHAR(50), HASHBYTES('MD5', 'inves'), 2), "Miguel Angel", "Gallego", "52320123R", "empleado_miguel@azteca.com", 612340129);
GO

-- Creación de usuarios --
-- Administrador --
CREATE USER inmoadmin WITH PASSWORD = "inves"
GO

GRANT ALL PRIVILEGES ON inmobiliaria.* TO inmoadmin
GO

-- Jefe de los empleados --
CREATE LOGIN jefe_empleado WITH PASSWORD = "Inves-1234"
GO

GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.empleados TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.casas TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.pisos TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.locales TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.garajes TO jefe_empleado

GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.alquiler_casas TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.pagos_casas TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.alquiler_pisos TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.pagos_pisos TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.alquiler_locales TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.pagos_locales TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.alquiler_garajes TO jefe_empleado
GRANT SELECT, INSERT, UPDATE, DELETE ON inmobiliaria.pagos_garajes TO jefe_empleado
GO

-- Empleados --
CREATE LOGIN empleado1 WITH PASSWORD = "Inves-1234"
GO

GRANT SELECT, INSERT ON inmobiliaria.casas TO empleado1
GRANT SELECT, INSERT ON inmobiliaria.pisos TO empleado1
GRANT SELECT, INSERT ON inmobiliaria.locales TO empleado1
GRANT SELECT, INSERT ON inmobiliaria.garajes TO empleado1

GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_casas TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_casas TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_pisos TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_pisos TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_locales TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_locales TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_garajes TO empleado1
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_garajes TO empleado1
GO

CREATE LOGIN empleado2 WITH PASSWORD = "Inves-1234"
GO

GRANT SELECT, INSERT ON inmobiliaria.casas TO empleado2
GRANT SELECT, INSERT ON inmobiliaria.pisos TO empleado2
GRANT SELECT, INSERT ON inmobiliaria.locales TO empleado2
GRANT SELECT, INSERT ON inmobiliaria.garajes TO empleado2

GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_casas TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_casas TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_pisos TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_pisos TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_locales TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_locales TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.alquiler_garajes TO empleado2
GRANT SELECT, INSERT, UPDATE ON inmobiliaria.pagos_garajes TO empleado2
GO

-- Funciones --

-- Funcion de sumar el total de dinero recaudado con los alquileres --

DROP FUNCTION IF EXISTS sumatodopagos
GO

CREATE FUNCTION sumatodopagos()
RETURNS INT
AS
BEGIN
DECLARE @casas INT = 0
DECLARE @pisos INT = 0
DECLARE @locales INT = 0
DECLARE @garajes INT = 0
DECLARE @resultado INT = 0
SET @casas = (SELECT SUM(valor) FROM pagos_casas)
SET @pisos = (SELECT SUM(valor) FROM pagos_pisos)
SET @locales = (SELECT SUM(valor) FROM pagos_locales)
SET @garajes = (SELECT SUM(valor) FROM pagos_garajes)
SET @resultado = (SELECT SUM(@casas + @pisos + @locales + @garajes))
RETURN @resultado
END
GO

SELECT dbo.sumatodopagos();
GO

-- Funcion de sumar todas las compras de las casas, piso, locales y garajes --

DROP FUNCTION IF EXISTS sumatodocompras
GO

CREATE FUNCTION sumatodocompras()
RETURNS INT
AS
BEGIN
DECLARE @casas INT = 0
DECLARE @pisos INT = 0
DECLARE @locales INT = 0
DECLARE @garajes INT = 0
DECLARE @resultado INT = 0
SET @casas = (SELECT SUM(valor) FROM compras_casas)
SET @pisos = (SELECT SUM(valor) FROM compras_pisos)
SET @locales = (SELECT SUM(valor) FROM compras_locales)
SET @garajes = (SELECT SUM(valor) FROM compras_garajes)
SET @resultado = (SELECT SUM(@casas + @pisos + @locales + @garajes))
RETURN @resultado
END
GO

SELECT dbo.sumatodocompras();
GO

-- Funcion sumar todo lo recaudado --

DROP FUNCTION IF EXISTS sumatodo
GO

CREATE FUNCTION sumatodo()
RETURNS INT
AS
BEGIN
DECLARE @resultado INT = 0
SET @resultado = (SELECT SUM(dbo.sumatodopagos() + dbo.sumatodocompras()))
RETURN @resultado
END
GO

SELECT dbo.sumatodo();
GO

-- Procedimientos --

-- Procedimiento que se introduce la funcion sumatodopagos como parametro de entrada y muestra el total de pagos con el impuesto incluido --

DROP PROCEDURE IF EXISTS impuesto_pago
GO

CREATE PROCEDURE impuesto_pago
 @valor INT = 0
AS
BEGIN
 DECLARE @operacion INT = 0
 DECLARE @resultado INT = 0
 SET @operacion = @valor * 0.21
 SET @resultado = @valor - @operacion
 SELECT @resultado
END
GO

EXEC impuesto_pago 
GO

-- Procedimiento que se introduce la funcion sumatodocompras como parametro de entrada y muestra el total de compras con el impuesto incluido --

DROP PROCEDURE IF EXISTS impuesto_compra
GO

CREATE PROCEDURE impuesto_compra
 @valor INT = 0
AS
BEGIN
 DECLARE @operacion INT = 0
 DECLARE @resultado INT = 0
 SET @operacion = @valor * 0.21
 SET @resultado = @valor - @operacion;
 SELECT @resultado;
END
GO

EXEC impuesto_compra 
GO

-- Cursores --
-- Sacar el valor total de pagos del alquiler mas caro de la casa--
DROP PROCEDURE IF EXISTS sumapagocasa
GO

CREATE PROCEDURE sumapagocasa
AS
BEGIN
 DECLARE @miid INT = 0
 DECLARE @midireccion VARCHAR(50) = ""
 DECLARE @mimetros INT = 0
 DECLARE @mivalor INT = 0
 DECLARE @maxid INT = 0
 DECLARE @maxdireccion VARCHAR(50) = ""
 DECLARE @maxmetros INT = 0
 DECLARE @maxvalor INT = 0
 DECLARE cursormaxpagos CURSOR FOR SELECT id_casa, direccion, metros, (SELECT sum(valor) FROM pagos_casas WHERE pagos_casas.alquiler=casas.id_casa) AS "Valor total" FROM casas GROUP BY id_casa, direccion, metros
 OPEN cursormaxpagos
  FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @mivalor
  WHILE @@FETCH_STATUS = 0
  BEGIN
	 IF @mivalor > @maxvalor
	 BEGIN
	  SET @maxid = @miid
	  SET @maxdireccion = @midireccion
	  SET @maxmetros = @mimetros
	  SET @maxvalor = @mivalor
	 END
	 FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @mivalor
  END
 CLOSE cursormaxpagos
 DEALLOCATE cursormaxpagos
 SELECT CONCAT("La casa con ID ", @maxid, " en la direccion ", @maxdireccion, " con ", @maxmetros, " metros cuadrados, tiene en total ", @maxvalor, " en total de pagos") AS "Resultado"
END
GO

EXEC sumapagocasa
GO
-- Lo mismo pero para pisos --
DROP PROCEDURE IF EXISTS sumapagopiso
GO

CREATE PROCEDURE sumapagopiso
AS
BEGIN
 DECLARE @miid INT = 0
 DECLARE @midireccion VARCHAR(50) = ""
 DECLARE @mimetros INT = 0
 DECLARE @miplanta INT = 0
 DECLARE @mipuerta VARCHAR(1) = ""
 DECLARE @mivalor INT = 0
 DECLARE @maxid INT = 0
 DECLARE @maxdireccion VARCHAR(50) = ""
 DECLARE @maxmetros INT = 0
 DECLARE @maxplanta INT = 0
 DECLARE @maxpuerta VARCHAR(1) = ""
 DECLARE @maxvalor INT = 0
 DECLARE cursormaxpagos CURSOR FOR SELECT id_piso, direccion, metros, planta, puerta, (SELECT sum(valor) FROM pagos_pisos WHERE pagos_pisos.alquiler=pisos.id_piso) AS "Valor total" FROM pisos GROUP BY id_piso, direccion, metros, planta, puerta
 OPEN cursormaxpagos
  FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @miplanta, @mipuerta, @mivalor
  WHILE @@FETCH_STATUS = 0
  BEGIN
	 IF @mivalor > @maxvalor
	 BEGIN
	  SET @maxid = @miid
	  SET @maxdireccion = @midireccion
	  SET @maxmetros = @mimetros
	  SET @maxplanta = @miplanta
	  SET @maxpuerta = @mipuerta
	  SET @maxvalor = @mivalor
	 END
	 FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @miplanta, @mipuerta, @mivalor
  END
 CLOSE cursormaxpagos
 DEALLOCATE cursormaxpagos
SELECT CONCAT("El piso con ID ", @maxid, " en la direccion ", @maxdireccion, " con ", @maxmetros, " metros cuadrados, con numero ", @maxplanta, " y letra ", @maxpuerta, " tiene en total ", @maxvalor, " en total de pagos") AS "Resultado"
END
GO

EXEC sumapagopiso
GO

-- Lo mismo pero para locales --
DROP PROCEDURE IF EXISTS sumapagolocal
GO

CREATE PROCEDURE sumapagolocal
AS
BEGIN
 DECLARE @miid INT = 0
 DECLARE @midireccion VARCHAR(50) = ""
 DECLARE @mimetros INT = 0
 DECLARE @miservicio VARCHAR(20) = ""
 DECLARE @mivalor INT = 0
 DECLARE @maxid INT = 0
 DECLARE @maxdireccion VARCHAR(50) = 0
 DECLARE @maxmetros INT = 0
 DECLARE @maxservicio VARCHAR(20) = ""
 DECLARE @maxvalor INT = 0
 DECLARE cursormaxpagos CURSOR FOR SELECT id_local, direccion, metros, servicio, (SELECT sum(valor) FROM pagos_locales WHERE pagos_locales.alquiler=locales.id_local) AS "Valor total" FROM locales GROUP BY id_local, direccion, metros, servicio
 OPEN cursormaxpagos
 FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @miservicio, @mivalor
 WHILE @@FETCH_STATUS = 0
  BEGIN
	 IF @mivalor > @maxvalor
	 BEGIN
	  SET @maxid = @miid
	  SET @maxdireccion = @midireccion
	  SET @maxmetros = @mimetros
	  SET @maxservicio = @miservicio
	  SET @maxvalor = @mivalor
	 END
	 FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @miservicio, @mivalor
  END
 CLOSE cursormaxpagos
 DEALLOCATE cursormaxpagos
 SELECT CONCAT("El local con ID ", @maxid, " en la direccion ", @maxdireccion, " con ", @maxmetros, " metros cuadrados, con servicio de ", @maxservicio, " tiene en total ", @maxvalor, " en total de pagos") AS "Resultado"
END
GO

EXEC sumapagolocal
GO

-- Lo mismo pero para garajes --
DROP PROCEDURE IF EXISTS sumapagogaraje
GO

CREATE PROCEDURE sumapagogaraje
AS
BEGIN
 DECLARE @miid INT = 0
 DECLARE @midireccion VARCHAR(50) = 0
 DECLARE @mimetros INT = 0
 DECLARE @miplanta INT = 0
 DECLARE @minumero INT = 0
 DECLARE @mivalor INT = 0
 DECLARE @maxid INT = 0
 DECLARE @maxdireccion VARCHAR(50) = 0
 DECLARE @maxmetros INT = 0
 DECLARE @maxplanta INT = 0
 DECLARE @maxnumero INT = 0
 DECLARE @maxvalor INT = 0
 DECLARE cursormaxpagos CURSOR FOR SELECT id_garaje, direccion, metros, planta, numero, (SELECT sum(valor) FROM pagos_garajes WHERE pagos_garajes.alquiler=garajes.id_garaje) AS "Valor total" FROM garajes GROUP BY id_garaje, direccion, metros, planta, numero
 OPEN cursormaxpagos
 FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @miplanta, @minumero, @mivalor
 WHILE @@FETCH_STATUS = 0
 BEGIN
	 IF @mivalor > @maxvalor
	 BEGIN
	  SET @maxid = @miid
	  SET @maxdireccion = @midireccion
	  SET @maxmetros = @mimetros
	  SET @maxplanta = @miplanta
	  SET @maxnumero = @minumero
	  SET @maxvalor = @mivalor
	 END
	 FETCH NEXT FROM cursormaxpagos INTO @miid, @midireccion, @mimetros, @miplanta, @minumero, @mivalor
  END
 CLOSE cursormaxpagos
 DEALLOCATE cursormaxpagos
SELECT CONCAT("El garaje con ID ", @maxid, " en la direccion ", @maxdireccion, " con ", @maxmetros, " metros cuadrados, con planta ", @maxplanta, " y numero ", @maxnumero, " tiene en total ", @maxvalor, " en total de pagos") AS "Resultado"
END
GO

EXEC sumapagogaraje
GO

-- Cursor de copias de seguridad

DROP PROCEDURE IF EXISTS cursorcopia
GO

CREATE PROCEDURE cursorcopia
AS
BEGIN
 DECLARE @name VARCHAR(50)
 DECLARE @path VARCHAR(256)
 DECLARE @fileName VARCHAR(256)
 DECLARE @fileDate VARCHAR(20)
 SET @path = 'C:\Program Files\Microsoft SQL Server\MSSQL13.MSSQLSERVER\MSSQL\Backup/'  
 SELECT @fileDate = CONVERT(VARCHAR(20),GETDATE(),112) 
 DECLARE db_cursor CURSOR FOR SELECT name FROM master.dbo.sysdatabases WHERE name NOT IN ('model','msdb','tempdb')
 OPEN db_cursor   
 FETCH NEXT FROM db_cursor INTO @name   
 WHILE @@FETCH_STATUS = 0   
 BEGIN   
  SET @fileName = @path + @name + '_' + @fileDate + '.bak'  
  BACKUP DATABASE @name TO DISK = @fileName  
  FETCH NEXT FROM db_cursor INTO @name   
 END   
CLOSE db_cursor   
DEALLOCATE db_cursor
END
GO

EXEC cursorcopia
GO

-- Ruta copias de seguridad --
C:\Program Files\Microsoft SQL Server\MSSQL13.MSSQLSERVER\MSSQL\Backup