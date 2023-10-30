CREATE DATABASE bdautenticacion;

CREATE TABLE usuario(
idUsuario bigint(20),
usNombre varchar(50),
usPass int(11),
usMail varchar(50),
usDeshabilitado timestamp,
PRIMARY KEY(idUsuario)
);


CREATE TABLE rol(
    idRol bigint(20),
    rolDescripcion varchar(50),
    PRIMARY KEY (idRol)
);

CREATE TABLE usuarioRol(
idUsuario bigint(20),
idRol bigint(20),
PRIMARY KEY (idUsuario, idRol),
foreign key (idUsuario) references usuario(idUsuario),
foreign key (idRol) references rol(idRol)
);