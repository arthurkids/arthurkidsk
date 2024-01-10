CREATE TABLE tb_usuarios(
    id  					INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres				 	VARCHAR(255) NULL,
    email 					VARCHAR(255) NULL,
    email_verificado		VARCHAR(255) NULL,
    contraseña 				VARCHAR(255) NULL,
    token 					VARCHAR(255) NULL,
    f_h_creacion 			DATETIME NULL,
    f_h_actualizacion 		DATETIME NULL,
    f_h_eliminacion 		DATETIME NULL,
    estado 					VARCHAR(10)
);