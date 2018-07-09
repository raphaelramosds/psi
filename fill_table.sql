insert into usuario(username, senha) values ("admin","4b3626865dc6d5cfe1c60b855e68634a"); --Senha: root
insert into usuario(username, senha) values ("monicaalmeida","daa290c0f0ebb8fb26a3600499122af6"); -- Senha: 12345

insert into psicologo(crp, datanascimento, emailpsicologo, nomepsicologo, sexopsicologo, usuario_idusuario)
values ("2222/58","2001/05/25","admin@hotmail.com","Administrador do Sistema",'M',$usuario_id1);

insert into psicologo(crp, datanascimento, emailpsicologo, nomepsicologo, sexopsicologo, usuario_idusuario)
values ("5555/90","1954/03/05","monicaalmeida@gmail.com","Mônica de Almeida Ferreira",'F',$usuario_id2);

------------------------------------- ID $psicologo_id1 --------------------------------------------------------------

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Natal","RN","Psicologia à saúde mental","(84)2222-2222",$psicologo_id1);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Mossoró","RN","Central de Atendimento à Psicologia","(84)5552-2022",$psicologo_id1);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Parnamirin","RN","Centro de Psicologia","(84)888-2332",$psicologo_id1);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Caicó","RN","Clínica de Psicologia","(84)2582-1010",$psicologo_id1);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("João Câmara","RN","Psiorganize","(84)2501-8599",$psicologo_id1);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("São José do Mipibu","RN","PSI atendimentos","(84)3838-5689",$psicologo_id1);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Psicologia aplicada","(84)5555-6557",$psicologo_id1);


insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (5555,0,"Engenheiro","raphael@gmail.com","Raphael Ramos da Silva",'M',$psicologo_id1,"(84)8789-7544");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (4222,10002,"Eletricista","fcandidoramos@bol.com.br","Francisca Ramos",'F',$psicologo_id1,"(84)8805-3360");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (3666,22228,"Médico","joaocandido82@gmail.com","João Candido Batista",'M',$psicologo_id1,"(84)8852-7498");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (4555,33338,"Advogado","marcelocosta@hotmail.com","Marcelos Costa e Silva",'M',$psicologo_id1,"(84)8825-5898");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (2020,10105,"Cientista","alberteinsten@hotmail.com","Albert Einstein",'M',$psicologo_id1,"(84)8825-3030");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (3030,20205,"Médico","anamaria@hotmail.com","Ana Maria Silva",'F',$psicologo_id1,"(84)8825-0200");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (5050,80805,"Telemarketing","eugeniocosta@hotmail.com","Eugênio Costa Vila",'M',$psicologo_id1,"(84)8005-5898");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (5010,40401,"Estudante","costamarcelo@hotmail.com","Costa Marcelo Villar",'M',$psicologo_id1,"(84)8015-0098");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0001,42501,"Químico orgânico","olimpiosilva@hotmail.com","Olímpio José Silva",'M',$psicologo_id1,"(84)8011-0222");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0010,1401,"Deputado Federal","rogeriomarinho@hotmail.com","Rogério Marinho da Silva",'M',$psicologo_id1,"(84)2202-0018");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0100,50401,"Estudante","juliabraga@hotmail.com","Júlia Ferreira Almeida",'F',$psicologo_id1,"(84)2585-0010");


insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("A03.2","Sofre de cólera",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",$psicologo_id1,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("A03.8","Medo de avião",'S','S',"Sessões com aviões de brinquedo","Apresentou evolução",$psicologo_id1,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("A04.1","Medo de andar de carro",'S','S',"Sessões com carros de brinquedo","Até agora nada",$psicologo_id1,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("A15.4","Medo do escuro",'N','S',"Sessões com diálogos","Evoluiu de forma exponencial",$psicologo_id1,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("A15.9","Medo de palhaço",'N','S',"Sessões com diálogos e visita à circos","Evoluiu de forma notória",$psicologo_id1,$clinica_id,$paciente_id);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Amenização de dores","O paciente apresentou baixas dores na região lombar","2018/07/09",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Final do tratamento","O paciente já não apresentou nenhuma dor na região lombar","2018/07/10",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Primeira viagem","Compra de passagem para conclusão do medo","2019/05/02",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Longa conversa","O paciente apresentou baixo desempenho quando ao medo","2019/06/02",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Conclusão da terapia","O paciente apresentou alto desempenho quando ao medo","2019/06/03",$prontuario_numero);


------------------------------------- ID $psicologo_id2 --------------------------------------------------------------

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Psicologia ao estado mental","(84)3582-0022",$psicologo_id2);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Unidade de Saúde da Família de Barreiras","(84)3333-2222",$psicologo_id2);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Unidade de Saúde da Família Diogo Lopes","(84)5858-2555",$psicologo_id2);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Unidade de Saúde da Família da Cohab","(84)3258-0222",$psicologo_id2);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Unidade de Saúde Centro Macau","(84)1478-2333",$psicologo_id2);

insert into clinica(cidade,estado,nomeclinica,telefone,id_psicologo)
values ("Macau","RN","Psicologia Central Macau","(84)4789-2547",$psicologo_id2);


insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (1300,0,"Programador de sistemas Web","marcosoliveira@gmail.com","Marcos Oliveira",'M',$psicologo_id2,"(84)8526-6935");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (2058,0,"Veterinário","hannantorres@gmail.com.br","Hannah Torres Sessa",'F',$psicologo_id2,"(84)8025-3026");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (3002,36987,"Ortopedista","thainatorres@hotmail.com","Thainá Silva Torres Sessa",'F',$psicologo_id2,"(84)2503-3699");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0,20228,"Neurocirurgião","raphaelramos@live.com","Raphael Ramos da Silva",'M',$psicologo_id2,"(84)2589-6999");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (4000,0,"Médico","juliaferraialmeida@gmail.com","Júlia Braga Ferreira de Almeida",'F',$psicologo_id2,"(84)3666-9805");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0060,0,"Psiquiatra","luizeugenio@hotmail.com","Villar Eugênio Luiz",'M',$psicologo_id2,"(84)8789-6999");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (1000,20247,"Dermatologista","pablocapistrano@gmail.com","Pablo Cunha Capistrano",'M',$psicologo_id2,"(84)5988-2555");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (2020,36547,"Engenheiro químico","olimpioraphael@hotmail.com","José Olímpio Rafael",'M',$psicologo_id2,"(84)3666-3699");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (3030,10254,"Jogador profissional","lebronoficial@yahoo.com.br","Lebron James",'M',$psicologo_id2,"(84)6555-2020");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (5050,25478,"Jogador profissional","neymarjr@hotmail.com","Neymar Junior",'M',$psicologo_id2,"(84)5789-3666");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (6060,24563,"Veterinário","anairis@gmail.com","Ana Iris Batista",'F',$psicologo_id2,"(84)3666-0569");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (7070,25789,"Professor","diegosilveiracn@gmail.com","Diego Nascimento Silveira Costa",'M',$psicologo_id2,"(84)6999-2555");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0,30554,"Estudante","ludisontuba@hotmail.com","Lúdison Felix",'M',$psicologo_id2,"(84)3666-5888");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (8080,20478,"Estudante","amandapaula@gmail.com","Amanda Paula Munção",'F',$psicologo_id2,"(84)2555-6905");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (9090,30589,"Estagiário em Telecomunicação","gabioliveira@uol.com.br","Gabriela Oliveira Silva",'F',$psicologo_id2,"(84)255-6999");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (1015,12584,"Estudante","enzopt@live.com","Enzo Strobino",'M',$psicologo_id2,"(25)222-202-22");

insert into paciente(numerosus,cartaosaude,profissao,emailpaciente,nomepaciente,sexopaciente,id_psicologo,telefonepaciente)
values (0,22220,"Professor","rafaelfisica@gmail.com","Alanderson Rafael Silva",'M',$psicologo_id2,"(84)3669-58777");

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("K75.9","Calculose da Vesícula Biliar Sem Colecistite",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",$psicologo_id2,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("K76","Calculose de Via Biliar Sem Colangite ou Colecistite ",'N','N',"Medicação e Acompanhamento","Evoluiu agora",$psicologo_id2,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("K75.3","Colecistite Crônica",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",$psicologo_id2,$clinica_id,$paciente_id);

insert into prontuario(cid10,diagnostico,encaminhado,alta,tratamentoadotado,evolucao,id_psicologo,clinica_id,paciente_id)
values ("K80.5","Perfuração da Vesícula Biliar",'N','N',"Medicação e Acompanhamento","Não evoluiu até agora",$psicologo_id2,$clinica_id,$paciente_id);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Total perda de controle","O paciente apresentou baixo desempenho ao seu medo","2017/02/09",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Conclusão do tratamento","O paciente já não apresentou nenhuma","2017/02/10",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Primeira titulação","Compra de passagem para conclusão do medo","2019/05/02",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Longo diálogo","O paciente apresentou baixo desempenho quando ao medo","2019/06/10",$prontuario_numero);

insert into sessao(titulo,descricao,data,numero_prontuario) 
values ("Finalização da terapia","O paciente apresentou alto desempenho quando ao medo","2019/06/11",$prontuario_numero);