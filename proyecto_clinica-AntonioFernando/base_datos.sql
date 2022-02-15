CREATE DATABASE clinica;
SET NAMES UTF8;
CREATE DATABASE IF NOT EXISTS clinica;
USE clinica;

DROP TABLE IF EXISTS pacientes;
CREATE TABLE IF NOT EXISTS pacientes( 
id              int auto_increment not null,
nombre          varchar(64) not null,
apellidos       varchar(64) not null,
correo          varchar(255) not null,
password        varchar(255) not null,
CONSTRAINT pk_pacientes PRIMARY KEY(id),
CONSTRAINT uq_correo UNIQUE(correo)  
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO pacientes VALUES(null,"Paula","Huertas Romano","paulahr@gmail.es","mipass");
INSERT INTO pacientes VALUES(null,"Nuria","Jimenez Garrido","nuriajg@gmail.es","mipass");

DROP TABLE IF EXISTS doctores;
CREATE TABLE IF NOT EXISTS doctores( 
id              int auto_increment not null,
nombre          varchar(64) not null,
apellidos       varchar(64) not null,
telefono        varchar(9) not null,
especialidad        varchar(255) not null,
CONSTRAINT pk_doctores PRIMARY KEY(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO doctores VALUES(null,"Fernando","Ruiz Fleetani","958721475","alergología");
INSERT INTO doctores VALUES(null,"Antonio","Almohano Soto","958127594","dermatología");

DROP TABLE IF EXISTS citas;
CREATE TABLE IF NOT EXISTS citas( 
id              int auto_increment not null,
paciente_id     int not null,
doctor_id       int not null,
fecha           date not null,
hora            time not null,
CONSTRAINT pk_doctores PRIMARY KEY(id),
CONSTRAINT fk_cita_paciente FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
CONSTRAINT fk_cita_doctor FOREIGN KEY(doctor_id) REFERENCES doctores(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO citas VALUES(null,"1","1","2022-01-12","18:05:00");
INSERT INTO citas VALUES(null,"2","2","2022-01-25","17:15:00");