insert into usuario(id, username, senha, email, role) 
values 
(1225, "admin","4b3626865dc6d5cfe1c60b855e68634a", "psi.enterpriseweb@gmail.com", 1), -- Senha: root
(8025, "monicaalmeida","daa290c0f0ebb8fb26a3600499122af6", "raphael.opensource@gmail.com", 1), -- Senha: 12345
(3355, "secretaria", "9fb7555bc8a2cbdc4d904ef8839a36fc", "raphael201110@live.com", 2); -- Senha: secretaria123

insert into psicologo(id, crp, datanascimento, nome, sexo, usuario_idusuario, codigo)
values 
(10080,"2222/58","2001/05/25","Administrador do Sistema",'M',1225,58823884),
(20025,"5555/90","1954/03/05","Mônica de Almeida Ferreira",'F',8025, 1058748);

insert into clinica(id,cidade,estado,nome,telefone,id_psicologo)
values 
(1280,"Natal","RN","Psicologia à saúde mental","(84)2222-2222",10080),
(1281,"Mossoró","RN","Central de Atendimento à Psicologia","(84)5552-2022",10080),
(1282,"Parnamirin","RN","Centro de Psicologia","(84)888-2332",10080),
(1283,"Caicó","RN","Clínica de Psicologia","(84)2582-1010",10080),
(1284,"João Câmara","RN","Psiorganize","(84)2501-8599",10080),
(1285,"São José do Mipibu","RN","PSI atendimentos","(84)3838-5689",10080),
(1286,"Macau","RN","Psicologia aplicada","(84)5555-6557",10080);


insert into paciente(id,numerosus,cartaosaude,profissao,email,nome,sexo,id_psicologo,telefone)
values
(2830,5555,0,"Engenheiro","raphael@gmail.com","Raphael Ramos da Silva",'M',10080,"(84)8789-7544"),
(2831,4222,10002,"Eletricista","fcandidoramos@bol.com.br","Francisca Ramos",'F',10080,"(84)8805-3360"),
(2832,3666,22228,"Médico","joaocandido82@gmail.com","João Candido Batista",'M',10080,"(84)8852-7498"),
(2833,4555,33338,"Advogado","marcelocosta@hotmail.com","Marcelos Costa e Silva",'M',10080,"(84)8825-5898"),
(2834,2020,10105,"Cientista","alberteinsten@hotmail.com","Albert Einstein",'M',10080,"(84)8825-3030"),
(2835,3030,20205,"Médico","anamaria@hotmail.com","Ana Maria Silva",'F',10080,"(84)8825-0200"),
(2836,5050,80805,"Telemarketing","eugeniocosta@hotmail.com","Eugênio Costa Vila",'M',10080,"(84)8005-5898"),
(2837,5010,40401,"Estudante","costamarcelo@hotmail.com","Costa Marcelo Villar",'M',10080,"(84)8015-0098"),
(2838,0001,42501,"Químico orgânico","olimpiosilva@hotmail.com","Olímpio José Silva",'M',10080,"(84)8011-0222"),
(2839,0010,1401,"Deputado Federal","rogeriomarinho@hotmail.com","Rogério Marinho da Silva",'M',10080,"(84)2202-0018"),
(2840,0100,50401,"Estudante","juliabraga@hotmail.com","Júlia Ferreira Almeida",'F',10080,"(84)2585-0010");


insert into prontuario(numeroprontuario,cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values
(5501,"A03.8","Medo de avião",'S','S',"Sessões com aviões de brinquedo","Apresentou evolução",10080,1280,2830),
(5502,"A04.1","Medo de andar de carro",'S','S',"Sessões com carros de brinquedo","Até agora nada",10080,1281,2830),
(5503,"A15.4","Medo do escuro",'N','S',"Sessões com diálogos","Evoluiu de forma exponencial",10080,1282,2831),
(5504,"A03.2","Sofre de cólera",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",10080,1283,2831),
(5505,"A15.9","Medo de palhaço",'N','S',"Sessões com diálogos e visita à circos","Evoluiu de forma notória",10080,1284,2840);

insert into sessao(id,titulo,descricao,data,numero_prontuario) 
values
(8051,"Amenização de dores","O paciente apresentou baixas dores na região lombar","2018/07/09",5501),
(8052,"Final do tratamento","O paciente já não apresentou nenhuma dor na região lombar","2018/07/10",5501),
(8053,"Primeira viagem","Compra de passagem para conclusão do medo","2019/05/02",5502),
(8054,"Longa conversa","O paciente apresentou baixo desempenho quando ao medo","2019/06/02",5502),
(8055,"Conclusão da terapia","O paciente apresentou alto desempenho quando ao medo","2019/06/03",5504);


insert into clinica(id,cidade,estado,nome,telefone,id_psicologo)
values 
(2021,"Macau","RN","Psicologia ao estado mental","(84)3582-0022",20025),
(2022,"Macau","RN","Unidade de Saúde da Família de Barreiras","(84)3333-2222",20025),
(2023,"Macau","RN","Unidade de Saúde da Família Diogo Lopes","(84)5858-2555",20025),
(2024,"Macau","RN","Unidade de Saúde da Família da Cohab","(84)3258-0222",20025),
(2025,"Macau","RN","Unidade de Saúde Centro Macau","(84)1478-2333",20025),
(2026,"Macau","RN","Psicologia Central Macau","(84)4789-2547",20025);


insert into paciente(id,numerosus,cartaosaude,profissao,email,nome,sexo,id_psicologo,telefone)
values
(1051,1300,0,"Programador de sistemas Web","marcosoliveira@gmail.com","Marcos Oliveira",'M',20025,"(84)8526-6935"),
(1052,0,20228,"Neurocirurgião","raphaelramos@live.com","Raphael Ramos da Silva",'M',20025,"(84)2589-6999"),
(1053,4000,0,"Médico","juliaferraialmeida@gmail.com","Júlia Braga Ferreira de Almeida",'F',20025,"(84)3666-9805"),
(1054,0060,0,"Psiquiatra","luizeugenio@hotmail.com","Villar Eugênio Luiz",'M',20025,"(84)8789-6999"),
(1055,1000,20247,"Dermatologista","pablocapistrano@gmail.com","Pablo Cunha Capistrano",'M',20025,"(84)5988-2555"),
(1056,2020,36547,"Engenheiro químico","olimpioraphael@hotmail.com","José Olímpio Rafael",'M',20025,"(84)3666-3699"),
(1057,3030,10254,"Jogador profissional","lebronoficial@yahoo.com.br","Lebron James",'M',20025,"(84)6555-2020"),
(1058,5050,25478,"Jogador profissional","neymarjr@hotmail.com","Neymar Junior",'M',20025,"(84)5789-3666"),
(1059,6060,24563,"Veterinário","anairis@gmail.com","Ana Iris Batista",'F',20025,"(84)3666-0569"),
(1060,7070,25789,"Professor","diegosilveiracn@gmail.com","Diego Nascimento Silveira Costa",'M',20025,"(84)6999-2555"),
(1061,0,30554,"Estudante","ludisontuba@hotmail.com","Lúdison Felix",'M',20025,"(84)3666-5888"),
(1062,8080,20478,"Estudante","amandapaula@gmail.com","Amanda Paula Munção",'F',20025,"(84)2555-6905"),
(1063,9090,30589,"Estagiário em Telecomunicação","gabioliveira@uol.com.br","Gabriela Oliveira Silva",'F',20025,"(84)255-6999"),
(1064,1015,12584,"Estudante","enzopt@live.com","Enzo Strobino",'M',20025,"(25)222-202-22"),
(1065,0,22220,"Professor","rafaelfisica@gmail.com","Alanderson Rafael Silva",'M',20025,"(84)3669-58777");

insert into prontuario(numeroprontuario,cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values
(9801,"K75.9","Calculose da Vesícula Biliar Sem Colecistite",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",20025,2021,1051),
(9802,"K76","Calculose de Via Biliar Sem Colangite ou Colecistite ",'N','N',"Medicação e Acompanhamento","Evoluiu agora",20025,2021,1051),
(9803,"K75.3","Colecistite Crônica",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",20025,2022,1052),
(9804,"K80.5","Perfuração da Vesícula Biliar",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",20025,2023,1053);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values
("Total perda de controle","O paciente apresentou baixo desempenho ao seu medo","2017/02/09",9801),
("Conclusão do tratamento","O paciente já não apresentou nenhuma","2017/02/10",9801),
("Primeira titulação","Compra de passagem para conclusão do medo","2019/05/02",9804),
("Longo diálogo","O paciente apresentou baixo desempenho quando ao medo","2019/06/10",9804),
("Finalização da terapia","O paciente apresentou alto desempenho quando ao medo","2019/06/11",9804);

insert into secretaria(id,nome,endereco,telefone,sexo,psicologo_id,usuario_idusuario)
values
(5401,"Jennifer Willys","Bel Cabral, 1216","8489877544",'F',20025,3355);