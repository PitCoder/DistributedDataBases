

create table UsuarioEmpresa(
	id varchar(15) not null primary key;
	nombre varchar(50),
	password varchar(32),
	tipo char,
	telefono varchar(20)
);

create table Supervisa(
	gerente varchar(15) not null,
	encargado varchar(15) not null,
	fechaGestion date,
	foreign key(gerente) references UsuarioEmpresa(id) on update cascade on delete cascade,
	foreign key(encargado) references UsuarioEmpresa(id) on update cascade on delete cascade
);

create table Almacen(
	id int not null primary key,
	nombre varchar(50),
	capacidad int,
	domicilio varchar(200),
	telefono varchar(20)
);

create table GestionAlmacen(
	idEncargado varchar(15) not null,
	idAlmacen int not null,
	fecha date,
	primary key(idEncargado, idAlmacen),
	foreign key (idEncargado) references UsuarioEmpresa(id) on update cascade on delete cascade,
	foreign key (idAlmacen) references Almacen(id) on update cascade on delete cascade
);

create table Estado(
	estado int not null primary key,
	nombre varchar(50),
	descripcion varchar(400)
);

create table Modelo(
	modelo varchar(20) not null primary key,
	nombre varchar(50),
	foto varchar(24),
	dimenAlto float,
	dimenAncho float,
	dimenProfun float,
	descrip varchar(400),
	precio float,
	descuento float,
	idEstado int,
	foreign key (idEstado) references Estado(estado) on update cascade on delete cascade
);

CREATE TABLE Material(
	id int not null primary key,
	nombre varchar(50)
);

CREATE TABLE MaterialModelo(
	idModelo varchar(20) not null,
	idMaterial int not null,
	primary key (idModelo, idMaterial),
	foreign key (idModelo) references Modelo(modelo) on update cascade on delete cascade,
	foreign key (idMaterial) references Material(id) on update cascade on delete cascade
);

CREATE TABLE Categoria(
	id int not null primary key,
	nombre varchar(50)
);

CREATE TABLE CategoriaModelo(
	idModelo varchar(20) not null,
	idCat int not null,
	primary key (idModelo, idCat),
	foreign key (idModelo) references Modelo(modelo) on update cascade on delete cascade,
	foreign key (idCat) references Categoria(id) on update cascade on delete cascade
);

CREATE TABLE Acabado(
	id int not null primary key,
	nombre varchar(50)
);

CREATE TABLE AcabadoModelo(
	idModelo varchar(20) not null,
	idAcabado int not null,
	primary key (idModelo, idAcabado),
	foreign key (idModelo) references Modelo(modelo) on update cascade on delete cascade,
	foreign key (idAcabado) references Acabado(id) on update cascade on delete cascade
);

CREATE TABLE Lote(
	lote int not null primary key,
	idModelo varchar(20),
	fechaFab date,
	cantidad int,
	foreign key(idModelo) references Modelo(modelo) on update cascade on delete cascade
);

CREATE TABLE Rotacion(
	operacion int not null primary key,
	idLote int,
	idAlmacen int,
	cantidad int,
	fecha date,
	motivo varchar(200),
	entrada tinyint(1),
	foreign key (idLote) references Lote(lote) on update cascade on delete cascade,
	foreign key (idAlmacen) references Almacen(id) on update cascade on delete cascade
);

CREATE TABLE Cliente(
	correo varchar(40) primary key,
	nombre varchar(50),
	password varchar(32),
	telefono varchar(20),
	notify boolean
);

CREATE TABLE Asesora(
	idCliente varchar(40) not null,
	idAgente varchar(15) not null,
	primary key (idCliente,idAgente),
	foreign key (idCliente) references Cliente(correo) on update cascade on delete cascade,
	foreign key (idAgente) references UsuarioEmpresa(id) on update cascade on delete cascade
);

CREATE TABLE Compra(
	id int not null primary key,
	idCliente varchar(40),
	total float,
	iva float,
	fecha date,
	foreign key (idCliente) references Cliente(correo) on update cascade on delete cascade
);

CREATE TABLE CompraMueble(
	idCompra int not null,
	idOperacion int not null,
	precio float,
	descuento float,
	primary key (idCompra,idOperacion),
	foreign key (idCompra) references Compra(id) on update cascade on delete cascade,
	foreign key (idOperacion) references Rotacion(operacion) on update cascade on delete cascade
);

CREATE TABLE Envio(
	idCompra int not null,
	idAlmacen int not null,
	fechaEnt date,
	cp varchar(5),
	dir varchar(200),
	cantMuebles int,
	primary key (idCompra,idAlmacen),
	foreign key (idCompra) references Compra(id) on update cascade on delete cascade,
	foreign key (idAlmacen) references Almacen(id) on update cascade on delete cascade
);



