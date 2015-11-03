<?php
class DB{
    private $dbh;
    private $className='stdClass';
    public function __construct(){
        try{
            $this->dbh=new PDO(DSN,USER,PASSWORD);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function set_class_name($className){
        $this->className=$className;
    }
    public function qwery($sql,$params=[]){
        try{
            $sth=$this->dbh->prepare($sql);
            if($sth->execute($params)){
                return $sth->fetchAll(PDO::FETCH_CLASS,$this->className);
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function exec($sql,$params=[]){
        try{
            $sth=$this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->rowCount();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}