CREATE TABLE users(
id_user int(4) AUTO_INCREMENT,
name varchar(255),
email varchar(255) NOT NULL,
password varchar(255) NOT NULL,
created_at timestamp,
updated_at timestamp,
PRIMARY KEY (id_user)
);

CREATE TABLE medico(
id_medico int(4) AUTO_INCREMENT,
med_nome varchar(255),
med_crm varchar(255) NOT NULL,
PRIMARY KEY (id_medico)
);

CREATE TABLE especialidade(
id_especialidade int(4) AUTO_INCREMENT,
espec_nome varchar(255),
PRIMARY KEY (id_especialidade)
);

INSERT INTO especialidade (espec_nome) VALUES ('especialidade 1');
INSERT INTO especialidade (espec_nome) VALUES ('especialidade 2');
INSERT INTO especialidade (espec_nome) VALUES ('especialidade 3');

CREATE TABLE med_espec(
id_med_espec int(4) AUTO_INCREMENT,
id_especialidade  int(4),
id_medico  int(4),
PRIMARY KEY (id_med_espec)
);

ALTER TABLE `med_espec` ADD CONSTRAINT `fk_medico` FOREIGN KEY ( `id_medico` ) REFERENCES `medico` ( `id_medico` ) ;
ALTER TABLE `med_espec` ADD CONSTRAINT `fk_especialidade` FOREIGN KEY ( `id_especialidade` ) REFERENCES `especialidade` ( `id_especialidade` ) ;

CREATE TABLE consulta(
id_consulta int(4) AUTO_INCREMENT,
data  timestamp,
hora  varchar(5),
particular  int(1),
PRIMARY KEY (id_consulta)
);

CREATE TABLE cons_med(
id_cons_med int(4) AUTO_INCREMENT,
id_medico  int(4),
id_consulta  int(4),
PRIMARY KEY (id_cons_med)
);

ALTER TABLE `cons_med` ADD CONSTRAINT `fk_medico_cons_med` FOREIGN KEY ( `id_medico` ) REFERENCES `medico` ( `id_medico` ) ;
ALTER TABLE `cons_med` ADD CONSTRAINT `fk_consulta_cons_med` FOREIGN KEY ( `id_consulta` ) REFERENCES `consulta` ( `id_consulta` ) ;

CREATE TABLE procedimento(
id_procedimento int(4) AUTO_INCREMENT,
proc_nome  varchar(250),
proc_valor  varchar(20),
PRIMARY KEY (id_procedimento)
);

INSERT INTO procedimento (proc_nome, proc_valor) VALUES ('procedimento 1', '2000');
INSERT INTO procedimento (proc_nome, proc_valor) VALUES ('procedimento 2', '3000');
INSERT INTO procedimento (proc_nome, proc_valor) VALUES ('procedimento 3', '150');


CREATE TABLE const_proc(
id_const_proc int(4) AUTO_INCREMENT,
id_procedimento  int(4),
id_consulta  int(4),
PRIMARY KEY (id_const_proc)
);

ALTER TABLE `const_proc` ADD CONSTRAINT `fk_procedimento` FOREIGN KEY ( `id_procedimento` ) REFERENCES `procedimento` ( `id_procedimento` ) ;
ALTER TABLE `const_proc` ADD CONSTRAINT `fk_consulta` FOREIGN KEY ( `id_consulta` ) REFERENCES `consulta` ( `id_consulta` ) ;


CREATE TABLE paciente (
id_paciente int(4) AUTO_INCREMENT,
pac_nome varchar(250),
pac_telefone  varchar(15),
pac_data_nascimento timestamp,
PRIMARY KEY (id_paciente)
);


CREATE TABLE const_pac(
id_const_pac int(4) AUTO_INCREMENT,
id_paciente  int(250),
id_consulta  int(11),
PRIMARY KEY (id_const_pac)
);

ALTER TABLE `const_pac` ADD CONSTRAINT `fk_paciente_const` FOREIGN KEY ( `id_paciente` ) REFERENCES `paciente` ( `id_paciente` ) ;
ALTER TABLE `const_pac` ADD CONSTRAINT `fk_consulta_const` FOREIGN KEY ( `id_consulta` ) REFERENCES `consulta` ( `id_consulta` ) ;

CREATE TABLE plano_saude(
id_plano_saude int(4) AUTO_INCREMENT,
plano_descricao  varchar(250),
plano_telefone varchar(15),
PRIMARY KEY (id_plano_saude)
);

INSERT INTO plano_saude (plano_descricao, plano_telefone) VALUES ('descrição 1', '6198989898');
INSERT INTO plano_saude (plano_descricao, plano_telefone) VALUES ('descrição 2', '6177878890');
INSERT INTO plano_saude (plano_descricao, plano_telefone) VALUES ('descrição 3', '6133937787');


CREATE TABLE pac_plan_cons(
id_pac_plano int(4) AUTO_INCREMENT,
nr_contrato  int(250),
id_plano_saude int(4),
id_consulta int(4),
PRIMARY KEY (id_pac_plano)
);

ALTER TABLE `pac_plan_cons` ADD CONSTRAINT `fk_pac_plan_cons` FOREIGN KEY ( `id_consulta` ) REFERENCES `consulta` ( `id_consulta` ) ;

