CREATE TABLE tb_roles(
    id_rol  				INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre				 	VARCHAR(255) NULL,
    token 					VARCHAR(255) NULL,
    f_h_creacion 			DATETIME NULL,
    f_h_actualizacion 		DATETIME NULL,
    f_h_eliminacion 		DATETIME NULL,
    estado 					VARCHAR(10)
);