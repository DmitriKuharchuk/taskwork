<?php

namespace app\models;

use loader\db\Model;
use loader\db\Db;


class Room extends Model
{

    protected $table = 'rooms';


    public function search($keyword)
    {
        $sql = "select * from `$this->table` where `item_name` like :keyword";
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [':keyword' => "%$keyword%"]);
        $sth->execute();
        return $sth->fetchAll();
    }


    public function getRooms(){
        $sql = "select * from `$this->table` ";
        $sth = Db::pdo()->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getRoomsById(int $id){
        $sql = "select * from `$this->table` where id = :id";
        $sth = Db::pdo()->prepare($sql);
        $sth->bindParam(':id', $id);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function deleteRooms(int $id){
        $sql = "DELETE FROM rooms WHERE id =  :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function insert(string $roomName){
        $sql = "INSERT INTO rooms (`roomName` ) VALUES ((:roomName))";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute(array(':roomName'=>$roomName ));
    }


    public function updateRoom(int $id){
        $sql = "UPDATE rooms SET roomName = :roomName where id= :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id );
        $stmt->bindParam(':roomName',$_POST['roomName'] );
        $stmt->execute();
        $stmt->fetchAll();
    }



}
