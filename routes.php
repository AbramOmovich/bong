<?php


$router->get('todo', 'TodoController@index');
$router->post('todo', 'TodoController@addTodo');
$router->post('todo/change' , 'TodoController@changeTodo');
