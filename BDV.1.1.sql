use proyecto;

create table Usuario (
  ID_U int not null Auto_Increment Primary Key,
  Tipo_usuario varchar(255) not null, 
  Contrasenia varchar(255) not null,
  Date_creation datetime not null,
  Email varchar(255) not null
  );
  
create table Cliente (
ID_Cliente int not null primary key,
foreign key (ID_Cliente) references Usuario(ID_U) ON DELETE CASCADE
);

SElect * from Usuario;

create table Pedido (
ID_Pedido int not null Auto_Increment,
Estado enum("Pago_Pendiente","Pago_Realizado","Enviado", "Finalizado"),
Fecha_pe datetime not null,
Importe int not null,
ID_Cliente int not null,
Primary key (ID_Pedido, ID_Cliente),
foreign key (ID_Cliente) references Cliente(ID_Cliente) ON DELETE CASCADE
);


create table Proveedor( 
ID_Proveedor int not null Auto_Increment Primary Key,
Direccion varchar(255),
Nombre varchar(255)
);

create table Proveedor_Telefonos (
Primary key(ID_Proveedor, telefono),
ID_Proveedor int not null,
telefono int not null,
foreign key (ID_Proveedor) references Proveedor(ID_Proveedor) ON DELETE CASCADE
);


create table Producto (
ID_Producto int not null Auto_Increment Primary Key,
Cantidad_Stock int not null,
Nombre varchar(255) not null,
Descripcion varchar(2048) not null,
Ventas int not null,
Precio int not null,
ID_Proveedor int not null,
foreign key (ID_Proveedor) references Proveedor(ID_Proveedor) ON DELETE CASCADE
);

create table Paquete ( 
ID_Paquete int not null Auto_Increment Primary Key,
Descripcion varchar(2048) not null,
Nombre varchar(255) not null,
Precio int not null
);

create table Producto_Paquete ( 
ID_Producto int not null, 
ID_Paquete int not null,
primary key(ID_Producto, ID_Paquete),
foreign key (ID_Producto) references Producto(ID_Producto) ON DELETE CASCADE,
foreign key (ID_Paquete) references Paquete(ID_Paquete) ON DELETE CASCADE 
);

CREATE VIEW Stock AS
SELECT Nombre, Cantidad_Stock As Stock, Ventas, Precio
FROM Producto;

Select * from Stock;

create role Jefe;
create role Vendedor;
create role Comprador;
create role Cliente;

Grant Select, Update, Insert on proyecto.Producto to Jefe;
Grant Select, Update, Insert on proyecto.Paquete to Jefe;
Grant Select, Update, Insert on proyecto.Proveedor to Jefe;
Grant Select, Update, Insert on proyecto.Usuario to Jefe;

Grant Select on proyecto.Stock to Vendedor;

Grant Select, Update, Insert on proyecto.Producto to Comprador;
Grant Select, Update, Insert on proyecto.Proveedor to Comprador;
Grant Select, Update, Insert on proyecto.Paquete to Comprador;

Insert into Proveedor(Direccion, Nombre)
Values("Arechavaletta 2456", "Pepe Porcinos Propios");
Insert into Proveedor(Direccion, Nombre)
Values("Avenida Italia 1456", "El Pino S.A");
Insert into Proveedor(Direccion, Nombre)
Values("Buceo Italia 1456", "El Patron S.R.L");

Insert into Producto (Cantidad_Stock, Nombre, Descripcion, Ventas, Precio, ID_Proveedor)
Values (90,"Guantes repiola","Son facheros", 120, 500, 3);