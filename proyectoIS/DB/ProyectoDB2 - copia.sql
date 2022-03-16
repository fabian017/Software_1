
CREATE DATABASE drogueria;

USE drogueria;

CREATE TABLE proveedor(
nit INT PRIMARY KEY,
nombre VARCHAR(50),
apellido VARCHAR(50),
telefono INT(10),
direccion VARCHAR(50),
ciudad VARCHAR(30)
);

CREATE TABLE detalleproveedor(
id INT AUTO_INCREMENT PRIMARY KEY,
nit INT,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
idproducto INT,
cantidad INT,
nombreproducto VARCHAR(60),
preciounidad FLOAT,
FOREIGN KEY (nit) REFERENCES proveedor(nit)
);

CREATE TABLE producto(
id INT PRIMARY KEY,
nombre VARCHAR(120),
cantidad INT check (cantidad>=0),
precio FLOAT
);

CREATE TABLE venta(
id INT AUTO_INCREMENT PRIMARY KEY,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
total FLOAT DEFAULT 0
);

CREATE TABLE detalleventa(
id INT AUTO_INCREMENT,
idventa INT,
idproducto INT,
cantidad INT,
PRIMARY KEY(id),
FOREIGN KEY (idventa) REFERENCES venta(id),
FOREIGN KEY (idproducto) REFERENCES producto(id)
);

CREATE TABLE auditoriaventa(
id INT,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
total FLOAT DEFAULT 0,
estado varchar(10) DEFAULT 'ACTIVA'
);

CREATE TABLE auditoriaproveedor(
id INT,
nit INT,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
idproducto INT,
cantidad INT,
nombreproducto VARCHAR(60),
preciounidad FLOAT,
preciototal FLOAT
);
--Suministro
delimiter $$
CREATE TRIGGER aumento_insumos AFTER INSERT ON detalleproveedor
FOR EACH ROW 
BEGIN
	DECLARE x INT;
	SET x = (SELECT COUNT(*) FROM producto p WHERE p.id=NEW.idproducto);
		if x=1 then   
			UPDATE producto p SET p.cantidad=p.cantidad+NEW.cantidad WHERE NEW.idproducto=p.id;
			INSERT INTO auditoriaproveedor (id,nit,idproducto,cantidad,nombreproducto,preciounidad,preciototal) 
			VALUES(NEW.id,NEW.nit,NEW.idproducto,NEW.cantidad,NEW.nombreproducto,NEW.preciounidad,NEW.preciounidad*NEW.cantidad);
		ELSEIF x=0 then
			INSERT INTO producto VALUES (NEW.idproducto,NEW.nombreproducto,NEW.cantidad,NEW.preciounidad);
			INSERT INTO auditoriaproveedor (id,nit,idproducto,cantidad,nombreproducto,preciounidad,preciototal) 
			VALUES(NEW.id,NEW.nit,NEW.idproducto,NEW.cantidad,NEW.nombreproducto,NEW.preciounidad,NEW.preciounidad*NEW.cantidad);
		END if;
END 
$$
--Venta
delimiter $$
CREATE TRIGGER disminucion_insumos AFTER INSERT ON detalleventa
FOR EACH ROW
BEGIN 
	UPDATE producto p SET p.cantidad=p.cantidad-NEW.cantidad WHERE p.id=NEW.idproducto;
	UPDATE auditoriaventa a SET a.total=a.total+NEW.cantidad*(SELECT p.precio FROM producto p WHERE p.id=NEW.idproducto) WHERE a.id=NEW.idventa;
	UPDATE venta v SET v.total=v.total+NEW.cantidad*(SELECT p.precio FROM producto p WHERE p.id=NEW.idproducto) WHERE v.id=NEW.idventa;
END 
$$ 
delimiter $$
CREATE TRIGGER auditoria_venta AFTER INSERT ON venta
FOR EACH ROW
BEGIN 
	INSERT INTO auditoriaventa (id) VALUES (NEW.id); 
END 
$$
--------------------------
delimiter $$
CREATE TRIGGER auditoria_venta_estado BEFORE DELETE ON venta
FOR EACH ROW
BEGIN 
	DELETE FROM detalleventa  WHERE idventa=OLD.id;
	UPDATE auditoriaventa a SET a.estado='CANCELADO' WHERE a.id=OLD.id; 
END 
$$

delimiter $$
CREATE TRIGGER restaura_cantidad AFTER DELETE ON detalleventa
FOR EACH ROW
BEGIN 
	UPDATE producto p SET p.cantidad=p.cantidad+OLD.cantidad WHERE p.id=OLD.idproducto;
END 
$$
