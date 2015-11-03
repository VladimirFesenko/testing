<?php

abstract class AModel{

    protected static $table;
    protected $data=[];

    public function __set($key, $value){
        $this->data[$key]=$value;
    }

    public function __get($key){
        return $this->data[$key];
    }

    public function __unset($key){
        unset($this->data[$key]);
    }
    public static function find_all(){
        $db=new DB();
        //$db->set_class_name(get_called_class());
        $sql='SELECT *
              FROM '.static::$table;
        return $db->qwery($sql);
    }

    public static function find_by_column($column,$value){
        $db=new DB();
        $db->set_class_name(get_called_class());
        $sql='SELECT *
              FROM '.static::$table.
            ' WHERE '.$column.'=:value';
        return $db->qwery($sql,[':value'=>$value])[0];
    }

    public function insert(){
        $cols=array_keys($this->data);
        $data=[];
        foreach($cols as $key=>$col){
            $data[':'.$col]=$this->data[$col];
        }
        $sql='INSERT INTO '.static::$table.
            '('.implode(',',$cols).')'.
            'VALUES ('.implode(',',array_keys($data)).')';

        $db=new DB();
        return $db->exec($sql,$data);
    }

    public function update(){
        $cols=[];
        $data=[];
        foreach($this->data as $key=>$val){
            $data[':'.$key]=$val;
            if($key=='id'){
                continue;
            }
            $cols[]=$key.'=:'.$key;
        }
        $sql='UPDATE '.static::$table.
            ' SET '.implode(',',$cols).
            ' WHERE id=:id';

        $db=new DB();
        return $db->exec($sql,$data);
    }
}