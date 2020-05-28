create table productos
(
    id int not null auto_increment,
    nombre varchar(50) not null,
    precio numeric(10,2) not null,
    cantidad int not null,
    primary key(id)
)engine=innodb;

create table clientes
(
    id int not null auto_increment,
    nombre varchar(50) not null,
    email varchar(100) not null,
    direccion varchar(100),
    login varchar(20) unique not null,
    password varchar(128) not null,
    telefono varchar(15),
    primary key(id)

)engine=innodb;

create table ventas
(
    id int not null auto_increment,
    fecha datetime not null,
    cliente_id int not null,
    estado char(1) not null default 'P',
    primary key(id),
    foreign key(cliente_id) references clientes(id)

)engine=innodb;

create table detalleventas
(
    id int not null auto_increment,
    venta_id int not null,
    producto_id int not null,
    cantidad int not null,
    precio int not null,
    primary key(id),
    foreign key(producto_id) references productos(id),
    foreign key(venta_id) references ventas(id),
    
)engine=innodb;
