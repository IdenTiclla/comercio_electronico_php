CREATE TABLE productos
(
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        precio NUMERIC(10, 2) NOT NULL,
        cantitad INT NOT NULL,
        PRIMARY KEY (id)
)engine=innodb;

CREATE TABLE clientes
(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    direccion VARCHAR(100),
    login VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(128) NOT NULL,
    telefono VARCHAR(15),
    PRIMARY KEY(id)
)engine=innodb;

CREATE TABLE ventas
(
    id INT NOT NULL AUTO_INCREMENT,
    fecha DATETIME NOT NULL,
    cliente_id INT NOT NULL,
    estado CHAR(1) NOT NULL DEFAULT 'P',
    PRIMARY KEY (id),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
)engine=innodb;
CREATE TABLE detalleventas
(
    id INT NOT NULL AUTO_INCREMENT,
    venta_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(venta_id) REFERENCES ventas(id),
    FOREIGN KEY(producto_id) REFERENCES productos(id)
)engine=innodb;