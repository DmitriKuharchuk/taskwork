<?php
namespace app\models;

use loader\db\Model;
use loader\db\Db;
use PDO;


class Workman extends Model
{

    protected $table = 'workman';


    public function search($keyword)
    {
        $sql = "select * from `$this->table` where `item_name` like :keyword";
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [':keyword' => "%$keyword%"]);
        $sth->execute();
        return $sth->fetchAll();
    }


    public function insert(string $name,string $surname, string $middlename, string $email,int $rooms){
        $sql = "INSERT INTO workman (`name`, `surname`,`middlename`,`email`,`roomId` ) VALUES ((:nameUser),(:surname),(:middlename),(:email),(:roomId))";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute(array(':nameUser'=>$name , ':surname' => $surname, ':middlename' => $middlename,':email' => $email,':roomId' => $rooms));

    }

    public function generateJsonEmail(){
        $file = 'getEmails.json';
        file_put_contents($file, '');
        $sql = "select email from `$this->table` ";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute();
        $emails = array();
        while($row = $stmt->fetchAll(\PDO::FETCH_ASSOC)){
            $emails[] = $row;
        }
        file_put_contents($file, json_encode($emails), FILE_APPEND | LOCK_EX);
    }


    public function generateJsonEmailById(int $id){
        $file = 'getEmails.json';
        file_put_contents($file, '');
        $sql = "select email from `$this->table` where id != :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $emails = array();
        while($row = $stmt->fetchAll(\PDO::FETCH_ASSOC)){
            $emails[] = $row;
        }
        file_put_contents($file, json_encode($emails), FILE_APPEND | LOCK_EX);
    }

    public function getItems(){
        $sql = "select workman.name, workman.surname,workman.id,workman.middlename, workman.email,rooms.roomName from  `$this->table` JOIN rooms ON workman.roomId = rooms.Id ";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getItemsById($id){
        $sql = "select workman.name, workman.surname,workman.id,workman.middlename, workman.email,rooms.roomName,phone.phone from  `$this->table`  JOIN phone ON workman.id = phone.workmanId JOIN rooms ON workman.roomId = rooms.Id  where workman.id = :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function deleteItem(int $id){
        $sql = "DELETE FROM workman WHERE id =  :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    public function updateData(int $id){
        $sql = "UPDATE workman SET `name` = :nameUser,surname = :surname,middlename = :middlename,email = :email, roomId = :roomId where id= :id";
        $stmt = Db::pdo()->prepare($sql);
        $stmt->bindParam(':id', $id );
        $stmt->bindParam(':nameUser',$_POST['name'] );
        $stmt->bindParam(':surname',$_POST['surname'] );
        $stmt->bindParam(':middlename',$_POST['middlename'] );
        $stmt->bindParam(':email',$_POST['email'] );
        $stmt->bindParam(':roomId',$_POST['rooms'] );
        $stmt->execute();
        $stmt->fetchAll();
    }

}