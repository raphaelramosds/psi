<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;
$db['default'] = array(
        'dsn'      => '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'psi',
        
        // 'username' => 'id6224306_root',
        // 'password' => '12345',
        // 'database' => 'id6224306_psi',
        
        'dbdriver' => 'mysqli',
        //'dbprefix' => 'psi_',
        'dbprefix' => '',
        'pconnect' => TRUE,
        'db_debug' => FALSE,
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => TRUE,
        'failover' => array()
);
