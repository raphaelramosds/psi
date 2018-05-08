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
	crp int primary key not null,
	nomepsicologo varchar(100) not null,
	emailpsicologo varchar(50) not null,
	sexopsicologo char,
	datanascimento date,
	usuario_idusuario int
);

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
	crp_psicologo int
);

alter table clinica
add constraint fk_crp foreign key (crp_psicologo) references psicologo(crp);

create table paciente(
	idpaciente int AUTO_INCREMENT primary key,
	numerosus int,
	cartaosaude int,
	profissao varchar(50),
	emailpaciente varchar(50) not null,
	nomepaciente varchar(50) not null,
	sexopaciente char,
	psicologo_crp int,
	telefonepaciente varchar(20)
);

alter table paciente
add constraint uq_emailpaciente unique(emailpaciente);

alter table paciente
add constraint fk_crppsi foreign key (psicologo_crp) references psicologo(crp);

create table prontuario(
	numeroprontuario int primary key not null auto_increment,
	diagnostico text,
	encaminhado char,
	alta char,
	tratamentoadotado text,
	cid10 varchar(45),
	evolucao text,
	psicologo_crp int,
	clinica_id int,
	paciente_id int
);

alter table prontuario
add constraint fk_clinicaid foreign key (clinica_id) references clinica(idclinica);

alter table prontuario
add constraint fk_crpp foreign key (psicologo_crp) references psicologo(crp);

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
