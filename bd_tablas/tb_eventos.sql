CREATE TABLE tb_eventos(
    id_evento				INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_evento           VARCHAR(255) NULL,
    f_evento				DATE NULL,
    h_ini-evento 			TIME NULL,
    h_fin_evento            TIME NULL,
    salon 			        VARCHAR(255) NULL,
    personas                INT(100) NULL,
    cliente                 VARCHAR(255) NULL,
    estado 					VARCHAR(10)
);