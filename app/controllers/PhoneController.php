<?php

namespace app\controllers;


use app\models\Phone;
use app\models\Room;
use loader\base\Controller;
use loader\db\Db;

class PhoneController extends  Controller{

    public function index(){
        $phones = (new Phone())->getAllPhones();
        $this->assign('phones', $phones);
        $this->render();
    }

    public function delete(int $id){
        (new Phone())->deletePhone($id);
        $this->render();
    }

    public function update(int $id){
        if ($_POST){
            (new Phone())->updatePhone($id);
        }
        $phones = (new Phone())->getPhoneById($id);
        $this->assign('phone', $phones);
        $this->render();
    }

}