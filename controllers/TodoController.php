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
        if ($_POST['title']){
            $title = trim(strip_tags( $_POST['title']));

            $this->db->insert('todo', [
                'title' => $title,
                'complete' => 0
            ]);
        }
        Request::back();
    }

    public function changeTodo(){
        $action = $_POST['action'];
        if ($action && isset($_POST['complete'])){
            if ($action === 'mark') {
                $this->db->update('todo', ['complete' => 1],[ 'id' => $_POST['complete'] ]);
            }
            else if ($action === 'delete'){
               $this->db->sql_delete('todo',[ 'id' => $_POST['complete'] ]);
            }
        }

        Request::back();
    }
}