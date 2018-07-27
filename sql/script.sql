-- '1' : Psicologo
-- '2' : Secretaria

create table usuario(
	idusuario int AUTO_INCREMENT primary key,
	username varchar(45) not null,
	role int default 1,
	senha varchar(80) not null
);

alter table usuario
add constraint uq_username unique(username);


create table psicologo(
	idpsicologo int primary key not null auto_increment,
	crp varchar(50) not null,
	nomepsicologo varchar(100) not null,
	emailpsicologo varchar(50) not null,
	sexopsicologo char,
	datanascimento date,
	usuario_idusuario int
);

create table secretaria(
	idsecretaria int primary key not null auto_increment,
	nome varchar(50),
	endereco text,
	telefone varchar(50),
	sexo char,
	clinica_id int,
	psicologo_id int,
	usuario_idusuario int
);

create table clinica(
	idclinica int AUTO_INCREMENT primary key,
	cidade varchar(45),
	estado varchar(45),
	nomeclinica varchar(50) not null,
	telefone varchar(20),
	id_psicologo int
);

create table paciente(
	idpaciente int AUTO_INCREMENT primary key,
	numerosus int,
	cartaosaude int,
	profissao varchar(50),
	emailpaciente varchar(50) not null,
	nomepaciente varchar(50) not null,
	sexopaciente char,
	id_psicologo int,
	telefonepaciente varchar(20)
);

create table prontuario(
	numeroprontuario int primary key not null auto_increment,
	cid10 varchar(50), 
	diagnostico text,
	encaminhado char,
	alta char,
	tratamentoadotado text,
	evolucao text,
	id_psicologo int,
	clinica_id int,
	paciente_id int
);

create table agenda(
	idagenda int primary key not null auto_increment,
	data_consulta date,
	horario varchar(20),
	paciente_id int,
	clinica_id int,
	secretaria_id int
);


create table sessao(
	idsessao int AUTO_INCREMENT primary key,
	titulo varchar(50),
	descricao text,
	data date,
	numero_prontuario int
);

-- FK Clinica

alter table clinica
add constraint fk_psicologo_clinica foreign key (id_psicologo) references psicologo(idpsicologo);


-- FK Paciente

alter table paciente
add constraint uq_emailpaciente unique(emailpaciente);

alter table paciente
add constraint fk_psicologo_paciente foreign key (id_psicologo) references psicologo(idpsicologo);


-- FK Psicologo


alter table psicologo
add constraint uq_crp unique(crp);

alter table psicologo
add constraint uq_emailpsicologo unique(emailpsicologo);

alter table psicologo
add constraint fk_usuario_psicologo foreign key (usuario_idusuario) references usuario(idusuario);

-- FK Secretaria

alter table secretaria
add constraint fk_clinica_secretaria foreign key (clinica_id) references clinica(idclinica);

alter table secretaria
add constraint fk_psicologo_secretaria foreign key (psicologo_id) references psicologo(idpsicologo);

alter table secretaria
add constraint fk_usuario_secretaria foreign key (usuario_idusuario) references usuario(idusuario);

-- FK Secretaria

alter table agenda
add constraint fk_paciente_agenda foreign key (paciente_id) references paciente(idpaciente);

alter table agenda
add constraint fk_clinica_agenda foreign key (clinica_id) references clinica(idclinica);

alter table agenda
add constraint fk_secretaria_agenda foreign key (secretaria_id) references secretaria(idsecretaria);

-- FK Ficha

alter table prontuario
add constraint fk_clinica_prontuario foreign key (clinica_id) references clinica(idclinica);

alter table prontuario
add constraint fk_psicologo_prontuario foreign key (id_psicologo) references psicologo(idpsicologo);

alter table prontuario
add constraint fk_paciente_prontuario foreign key (paciente_id) references paciente(idpaciente);

alter table sessao
add constraint fk_prontuario_sessao foreign key (numero_prontuario) references prontuario(numeroprontuario);
