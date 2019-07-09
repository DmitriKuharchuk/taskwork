<?php

namespace app\controllers;

use app\models\Phone;
use app\models\Room;
use app\models\Workman;
use loader\base\controller;
use loader\db\Db;
use loader\db\Model;
use PDO;


class MainController extends  Controller
{

    public function index(){
        (new Workman())->generateJsonEmail();
        $items = (new Workman())->getItems();
        $this->assign('items', array_unique($items,SORT_REGULAR   ));
        $this->render();
    }

    public function add(){
        (new Workman())->generateJsonEmail();
        $rooms = (new Room())->getRooms();
        $this->assign('rooms', $rooms);
        $this->render();
    }

    public function delete(int $id ){

        (new Workman())->deleteItem($id);
        $this->render();
    }

    public function update(int $id ){
        (new Workman())->generateJsonEmailById($id);
        if ($_POST){
            (new Workman())->updateData($id);
        }
        $items = (new Workman())->getItemsById($id);
        $rooms = (new Room())->getRooms();
        $this->assign('rooms', $rooms);
        $this->assign('items', $items);
        $this->render();
    }


    public function addWorkman(){
        foreach ($_POST['phone'] as $phone){
            (new Phone())->insert($phone);
        }
        (new Workman())->insert($_POST['name'],$_POST['surname'],$_POST['middlename'],$_POST['email'],$_POST['rooms']);
        $this->render();
    }










}