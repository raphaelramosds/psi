<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Usuarios/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Home
$route['cid'] = 'Home/viewcid';

//Login
$route['home'] = 'Home';
$route['login'] = 'Usuarios/login';
$route['cadastre'] = 'Usuarios/create';
$route['forgot-password'] = 'Usuarios/forgotPassword';
$route['auth-code'] = 'Usuarios/auth_code';
$route['escolher'] = 'Usuarios/escolhercadastro';

//Psicólogo
$route['update-psycho/(:num)'] = 'Psicologos/edit/$1';
$route['view-psycho'] = 'Psicologos';

//Clinicas
$route['create-clinica'] = 'Clinicas/create';
$route['update-clinica/(:num)'] = 'Clinicas/edit/$1';
$route['delete-clinica/(:num)'] = 'Clinicas/delete/$1';
$route['view-clinica'] = 'Clinicas/index';

//Pacientes
$route['create-paciente'] = 'Pacientes/create';
$route['update-paciente/(:num)'] = 'Pacientes/edit/$1';
$route['delete-paciente/(:num)'] = 'Pacientes/delete/$1';
$route['view-paciente'] = 'Pacientes/index';

//Prontuarios
$route['create-prontuario'] = 'Prontuarios/create';
$route['update-prontuario/(:num)'] = 'Prontuarios/edit/$1';
$route['delete-prontuario/(:num)'] = 'Prontuarios/delete/$1';
$route['index-prontuario/(:num)'] = 'Prontuarios/index/$1';
$route['view-prontuario'] = 'Prontuarios/view';

//Sessoes
$route['create-sessao'] = 'Sessoes/create';
$route['update-sessao/(:num)'] = 'Sessoes/edit/$1';
$route['delete-sessao/(:num)'] = 'Sessoes/delete/$1';
$route['index-sessao/(:num)'] = 'Sessoes/index/$1';
$route['view-sessao'] = 'Sessoes/view';

//Secretarias
$route['create-secretaria'] = 'Usuarios/createsecretaria';
$route['view-secretaria'] = 'Secretarias/view';
$route['update-secretaria/(:num)'] = 'Secretarias/edit/$1';
$route['delete-secretaria/(:num)'] = 'Secretarias/delete/$1';

//Agenda
$route['view-agenda'] = 'Agenda/view';
$route['create-agenda'] = 'Agenda/create';

$route['clinica-secretaria/(:num)'] = "ClinicaSecretaria/index/$1";

