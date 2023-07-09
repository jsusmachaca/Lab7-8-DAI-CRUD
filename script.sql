-- POR FAVOR EJECUTAR ESTE SCRIPT EN MYSQL USANDO "SOURCE ruta_del_script.sql".
-- PARA ELLO CREAR USA BASE DE DATOS NUEVA LLAMADA PRODUCTS 
-- Y DENTRO DE ELLA CON "USE PRODUCTS;" ESCRIBIR LA SENTECIA "SOURCE ruta_del_script.sql"
-- SALUDOS.

CREATE TABLE EMPLEADOS (
  nombres CHAR(30),
  apelllidos CHAR(30),
  id_emp INT(5) PRIMARY KEY,
  dni INT(8),
  sueldo DECIMAL(5.2),
  horas_trabajo INT(3),
  telefono INT(8)
);

CREATE TABLE BEBIDAS (
  nombre CHAR(30),
  precio DECIMAL(5.2)
);

CREATE TABLE MENU(
  nombre_plato CHAR(30),
  precio DECIMAL(5.2)
);

CREATE TABLE PRODUCTOS(
  nombre_producto CHAR(30), 
  cantidad_Kg DECIMAL(5.2),
  precio_Kg DECIMAL(5.2), 
  precio_Gral DECIMAL(5.2)
);

CREATE TABLE BENEFICIOS(
  id_emp int(5),
  PRIMARY KEY(id), FOREIGN KEY(id_emp) REFERENCES EMPLEADOS(id_emp),

  id int NOT NULL AUTO_INCREMENT,
  monto int(4),
  canasta varchar(2)
);

INSERT INTO EMPLEADOS() 
VALUES (
     "Algún",
     "Nombre", 
     10011, 
     12345678, 
     300.50
);


INSERT INTO BEBIDAS()
VALUES (
     "CocaCola",
     2.50
);


INSERT INTO MENU()
VALUES (
     "Cevichaso",
     10.00
);

INSERT INTO PRODUCTOS()
VALUES (
     "Camote",
     50.00,
     3.00,
     150.00
);


-- TECSUPAQP 2023.
