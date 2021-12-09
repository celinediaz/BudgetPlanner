

CREATE TABLE usuarios
(
    id int(255) AUTO_INCREMENT not null,
    nombre varchar(100) NOT null,
    apellidos varchar(100) NOT null,
    email varchar(255) NOT null,
    password varchar(255) NOT null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email) 
    );   
 

CREATE TABLE categorias (id int(10) NOT NULL AUTO_INCREMENT,
                        nombre varchar(20),
                        descripcion char(255),
                        presupuesto decimal(19, 0),
                        user_id int(10) NOT NULL,
                        PRIMARY KEY (id));
 

ALTER TABLE categorias ADD CONSTRAINT fk_cat_user FOREIGN KEY (user_id) REFERENCES usuarios(id);
 

CREATE TABLE Gasto (gasto_id int(10) NOT NULL AUTO_INCREMENT,
                    nombre_gasto varchar(35),
                    descripcion char(255),
                    fecha date,
                    precio decimal(19, 2),
                    categoria_id int(10) NOT NULL,
                    PRIMARY KEY (gasto_id));
 

 
ALTER TABLE Gasto ADD CONSTRAINT fk_gasto_cat FOREIGN KEY (categoria_id) REFERENCES categorias (id);