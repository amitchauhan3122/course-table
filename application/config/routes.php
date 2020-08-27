<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['api'] = 'api/index';

$route['send-email'] = 'EmailController';
$route['email'] = 'EmailController/send';

$route['sign_up'] = 'students/register';
$route['login'] = 'students/login';
$route['courses'] = 'courses/course_data';

// $route['test_api'] = 'test_api/index';
$route['subjects'] = 'subjects/subject_data';
$route['subjects/create'] = 'subjects/create';
$route['subjects/edit'] = 'subjects/edit';


$route['default_controller'] = 'subjects/subject_data';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
