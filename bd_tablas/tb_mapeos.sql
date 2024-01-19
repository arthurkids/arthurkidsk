CREATE TABLE tb_mapeos(
    id_map				    INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_espacio          VARCHAR(255) NULL,
    num_espacio				VARCHAR(255) NULL,
    estado_espacio 			VARCHAR(255) NULL,
    observacion             VARCHAR(255) NULL,
    f_h_creacion 			DATETIME NULL,
    f_h_actualizacion 		DATETIME NULL,
    f_h_eliminacion 		DATETIME NULL,
    estado 					VARCHAR(10)
);