<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']   = 'UsuariosController/login';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

//Login
$route['home']            = 'HomeController';
$route['login']           = 'UsuariosController/login';
$route['cadastre']        = 'UsuariosController/create';
$route['forgot-password'] = 'UsuariosController/forgotPassword';
$route['auth-code']       = 'UsuariosController/auth_code';

//Psicólogo
$route['update-psycho/(:num)']  = 'PsicologosController/edit/$1';
$route['view-psycho']           = 'PsicologosController';

//Clinicas
$route['create-clinica']        = 'ClinicasController/create';
$route['update-clinica/(:num)'] = 'ClinicasController/edit/$1';
$route['delete-clinica/(:num)'] = 'ClinicasController/delete/$1';
$route['view-clinica']          = 'ClinicasController/index';

//Pacientes
$route['create-paciente']        = 'PacientesController/create';
$route['update-paciente/(:num)'] = 'PacientesController/edit/$1';
$route['delete-paciente/(:num)'] = 'PacientesController/delete/$1';
$route['view-paciente']          = 'PacientesController/index';

//Prontuarios
$route['create-prontuario']         = 'ProntuariosController/create';
$route['update-prontuario/(:num)']  = 'ProntuariosController/edit/$1';
$route['delete-prontuario/(:num)']  = 'ProntuariosController/delete/$1';
$route['index-prontuario/(:num)']   = 'ProntuariosController/index/$1';
$route['view-prontuario']           = 'ProntuariosController/view';

//Sessoes
$route['create-sessao']        = 'SessoesController/create';
$route['update-sessao/(:num)'] = 'SessoesController/edit/$1';
$route['delete-sessao/(:num)'] = 'SessoesController/delete/$1';
$route['index-sessao/(:num)']  = 'SessoesController/index/$1';
$route['view-sessao']          = 'SessoesController/view';

//Secretarias
$route['create-secretaria']         = 'SecretariasController/create';
$route['view-secretaria']           = 'SecretariasController/view';
$route['update-secretaria/(:num)']  = 'SecretariasController/edit/$1';

