<?php

namespace app\models;

use loader\db\Model;
use loader\db\Db;


class Phone extends Model
{

    protected $table = 'phone';


    public function getAllPhones(){
        $sql = "select workman.name, workman.surname,phone.id,workman.middlename, workman.email,phone.phone from  `$this->table` JOIN workman ON  phone.workmanId = workman.id  ";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();


    }

    public function deletePhone(int $id){
        $sql = "DELETE FROM phone WHERE id =  :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    public function search($keyword)
    {

        $sql = "select * from `$this->table` where `item_name` like :keyword";
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [':keyword' => "%$keyword%"]);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function insert(string $phone ) {
        $sql = "INSERT INTO phone (phone, workmanId ) VALUES (?,?)";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute(array($phone ,$this->getLastId()));
    }


    public function getPhones($id) {
        $sql = "select * from `$this->table` where workmanId = :id";
        $sth = Db::pdo()->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->execute();
        $sth->fetchAll();
    }


    public function updatePhone(int $id){
        $sql = "UPDATE phone SET phone = :phone where id= :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id );
        $stmt->bindParam(':phone',$_POST['phone'] );
        $stmt->execute();
        $stmt->fetchAll();
    }


    public function getPhoneById(int $id){
        $sql = "select * from `$this->table` where id = :id";
        $sth = Db::pdo()->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getLastId(){
        $sql = "select MAX(id) from  workman";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute();
        $id = $stmt->fetchAll();
        return $id[0]['MAX(id)'];
    }
}
