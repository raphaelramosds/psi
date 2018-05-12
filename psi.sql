create database psi;

create table usuario(
	idusuario int AUTO_INCREMENT primary key,
	username varchar(45) not null,
	senha varchar(80) not null
);

alter table usuario
add constraint uq_username unique(username);

alter table usuario
add constraint uq_senha unique(senha);

create table psicologo(
	idpsicologo int primary key not null auto_increment,
	crp varchar(50) not null,
	nomepsicologo varchar(100) not null,
	emailpsicologo varchar(50) not null,
	sexopsicologo char,
	datanascimento date,
	usuario_idusuario int
);

alter table psicologo
add constraint uq_crp unique(crp);

alter table psicologo
add constraint uq_emailpsicologo unique(emailpsicologo);

alter table psicologo
add constraint fk_idusuario foreign key (usuario_idusuario) references usuario(idusuario);


create table clinica(
	idclinica int AUTO_INCREMENT primary key,
	cidade varchar(45),
	estado varchar(45),
	nomeclinica varchar(50) not null,
	telefone varchar(20),
	id_psicologo int
);

alter table clinica
add constraint fk_id_psicologo foreign key (id_psicologo) references psicologo(idpsicologo);

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

alter table paciente
add constraint uq_emailpaciente unique(emailpaciente);

alter table paciente
add constraint fk_psicologo_id foreign key (id_psicologo) references psicologo(idpsicologo);

create table prontuario(
	numeroprontuario int primary key not null auto_increment,
	diagnostico text,
	encaminhado char,
	alta char,
	tratamentoadotado text,
	cid10 varchar(45),
	evolucao text,
	id_psicologo int,
	clinica_id int,
	paciente_id int
);

alter table prontuario
add constraint fk_clinicaid foreign key (clinica_id) references clinica(idclinica);

alter table prontuario
add constraint fk_psicologoid foreign key (id_psicologo) references psicologo(idpsicologo);

alter table prontuario
add constraint fk_idpaciente foreign key (paciente_id) references paciente(idpaciente);

create table sessao(
	idsessao int AUTO_INCREMENT primary key,
	titulo varchar(50),
	descricao text,
	data date,
	numero_prontuario int
);

alter table sessao
add constraint fk_numeroprontuario foreign key (numero_prontuario) references prontuario(numeroprontuario);
