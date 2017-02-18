<?php
namespace Controllers;

use Core\App;
use Core\Request;

class TodoController
{
    private $db;

    public function __construct()
    {
        $this->db = App::get('db');
    }
    public function index()
    {
        $tasks = $this->db->select('todo');

        include_once "views/todo.view.php";
    }

    public function addTodo()
    {
        $this->db->insert('todo', [
            'title' => $_POST['title'],
            'complete' => 0
        ]);

        Request::back();
    }

    public function checkTodo(){
        $this->db->update('todo', ['complete' => 1],[ 'id' => $_POST['complete']]);
    }
}