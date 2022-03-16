
-- Trigger, después de INSERT detalleventa, calcular el valor total y quitar disminuir el númeor de articulos disponibles en tienda

UPDATE detalleventa as dv, producto as p SET 
dv.precio = dv.cantidad*(SELECT p.precio FROM detalleventa as dv INNER JOIN producto as p ON dv.idproducto=p.id), 
p.unidades=(SELECT p.unidades FROM detalleventa as dv INNER JOIN producto as p ON dv.idproducto=p.id)-dv.cantidad 
where dv.idproducto=p.id;



delimiter $$
CREATE TRIGGER disminucion_insumos AFTER INSERT ON detalleventa
FOR EACH ROW
BEGIN 
	UPDATE producto as p SET p.unidades=p.unidades-NEW.cantidad WHERE p.id=NEW.idproducto;
	UPDATE venta as v SET v.total=v.total+NEW.cantidad*(SELECT p.precio FROM producto p WHERE p.id=NEW.idproducto) WHERE v.id=NEW.idventa;
END
$$

delimiter $$
CREATE TRIGGER restaura_cantidad AFTER DELETE ON detalleventa
FOR EACH ROW
BEGIN 
	UPDATE producto as p SET p.unidades=p.unidades+OLD.cantidad WHERE p.id=OLD.idproducto;
    -- Agregar en casod e encontrar solucion a lo de venta --
    UPDATE venta as v SET v.total=v.total-OLD.cantidad*(SELECT p.precio FROM producto p WHERE p.id=OLD.idproducto) WHERE v.id=OLD.idventa;
END 
$$
-- 

delimiter $$
CREATE TRIGGER auditoria_venta_estado BEFORE DELETE ON venta
FOR EACH ROW
BEGIN 
	DELETE FROM detalleventa  WHERE idventa=OLD.id;
	--UPDATE auditoriaventa a SET a.estado='CANCELADO' WHERE a.id=OLD.id; 
END 
$$


-- Posible solucion --
-- Total en detalleventa y quitar el total en venta e ir calculando el total del detalle después de insertar--



INSERT INTO `venta`(`idcliente``) VALUES ('1234')




