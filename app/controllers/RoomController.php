<?php

namespace app\controllers;


use app\models\Room;
use loader\base\Controller;
use loader\db\Db;

class RoomController extends  Controller {


    public function index() {

        $rooms = (new Room())->getRooms();
        $this->assign('rooms', $rooms);
        $this->render();
    }

    public function delete(int $id) {

        (new Room())->deleteRooms($id);
        $this->render();
    }

    public function add() {
        $this->render();
    }

    public function addRoom(){
        (new Room())->insert($_POST['roomName']);
        $this->render();
    }


    public function update(int $id){
        if ($_POST){
            (new Room())->updateRoom($id);
        }
        $rooms = (new Room())->getRoomsById($id);
        $this->assign('rooms', $rooms);
        $this->render();
    }




}