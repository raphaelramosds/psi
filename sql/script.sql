-- '1' : Psicologo
-- '2' : Secretaria

create table usuario(
	id int AUTO_INCREMENT primary key,
	username varchar(45) not null,
	email varchar(50),
	role int default 1,
	senha varchar(80) not null
);

create table psicologo(
	id int primary key not null auto_increment,
	crp varchar(50) not null,
	nome varchar(100) not null,
	sexo char,
	datanascimento date,
	usuario_idusuario int
);

create table secretaria(
	id int primary key not null auto_increment,
	nome varchar(50),
	endereco text,
	telefone varchar(50),
	sexo char,
	clinica_id int,
	psicologo_id int,
	usuario_idusuario int
);

create table clinica(
	id int AUTO_INCREMENT primary key,
	cidade varchar(45),
	estado varchar(45),
	nome varchar(50) not null,
	telefone varchar(20),
	id_psicologo int
);

create table paciente(
	id int AUTO_INCREMENT primary key,
	numerosus int,
	cartaosaude int,
	profissao varchar(50),
	email varchar(50) not null,
	nome varchar(50) not null,
	sexo char,
	id_psicologo int,
	telefone varchar(20)
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
	id int primary key not null auto_increment,
	mes varchar(20),
	ano varchar(20),
	psicologo_id int
);

create table horario(
	id int primary key not null auto_increment,
	dia varchar(30),
	hinicial time,
	hfinal time,
	clinica_id int,
	paciente_id int,
	agenda_id int
);

create table sessao(
	id int primary key not null auto_increment,
	titulo varchar(50),
	descricao text,
	data date,
	numero_prontuario int
);

-- FK Usuário

alter table usuario
add constraint uq_username unique(username);

alter table usuario
add constraint uq_email unique(email);

-- FK Clinica

alter table clinica
add constraint fk_psicologo_clinica foreign key (id_psicologo) references psicologo(id);


-- FK Paciente

alter table paciente
add constraint uq_emailpaciente unique(email);

alter table paciente
add constraint fk_psicologo_paciente foreign key (id_psicologo) references psicologo(id);


-- FK Psicologo

alter table psicologo
add constraint uq_crp unique(crp);

alter table psicologo
add constraint fk_usuario_psicologo foreign key (usuario_idusuario) references usuario(id);

-- FK Secretaria

alter table secretaria
add constraint fk_clinica_secretaria foreign key (clinica_id) references clinica(id);

alter table secretaria
add constraint fk_psicologo_secretaria foreign key (psicologo_id) references psicologo(id);

alter table secretaria
add constraint fk_usuario_secretaria foreign key (usuario_idusuario) references usuario(id);

-- FK Agenda

alter table agenda
add constraint fk_psicologo_agenda foreign key (psicologo_id) references psicologo(id);

-- FK Ficha

alter table prontuario
add constraint fk_clinica_prontuario foreign key (clinica_id) references clinica(id);

alter table prontuario
add constraint fk_psicologo_prontuario foreign key (id_psicologo) references psicologo(id);

alter table prontuario
add constraint fk_paciente_prontuario foreign key (paciente_id) references paciente(id);

alter table sessao
add constraint fk_prontuario_sessao foreign key (numero_prontuario) references prontuario(numeroprontuario);


-- FK Horário

alter table horario
add constraint fk_paciente_horario foreign key (paciente_id) references paciente(id);

alter table horario
add constraint fk_agenda_horario foreign key (agenda_id) references agenda(id);
