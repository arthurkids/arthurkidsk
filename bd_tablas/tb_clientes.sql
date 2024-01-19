CREATE TABLE tb_clientes(
    id_cliente				INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre                  VARCHAR(255) NULL,
    apellido				VARCHAR(255) NULL,
    email 			        VARCHAR(255) NULL,
    contraseña 				VARCHAR(255) NULL,
    telefono                INT(15) NULL,
    f_h_creacion            VARCHAR(255) NULL,
    estado 					VARCHAR(10)
);