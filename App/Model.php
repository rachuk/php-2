<?php

namespace App;

use App\Controllers\Errors\FillException;
use App\Exceptions\Errors;

abstract class Model
{
    public const TABLE = '';
    public $id;

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class, []);
    }

    public static function findById($id)
    {
        $db = new Db;
        $data = ['table' => static::TABLE];
        $sql = 'SELECT * FROM ' . $data['table'] . ' WHERE id=:id';

        $data = $db->query($sql, static::class, [':id' => $id]);
        if (!empty($data)) {
            return $data[0];
        }
        return false;
    }

    public static function findLastThree()
    {
        $db = new Db();
        $data = ['table' => static::TABLE];
        $sql = 'SELECT * FROM  ' . $data['table'] . ' ORDER BY id desc LIMIT 3';

        return $db->query($sql, static::class, []);
    }

    public function update()
    {
        $fields = get_object_vars($this);
        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                $data[':' . $name] = $value;
                continue;
            }
            $cols[] = $name . " = :".$name;
            $data[':' . $name] = $value;
        }
        $sql = 'UPDATE '. static::TABLE . ' SET ' . implode(',', $cols) . ' WHERE id = :id';
        var_dump($sql);
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function insert() {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }
        $sql = 'INSERT INTO '. static::TABLE . ' 
        (' . implode(',', $cols) . ')
        VALUES 
        (' . implode(',', array_keys($data)) . ') ';
        $db = new Db();
        $db->execute($sql, $data);
        echo $sql;
        $this->id = $db->getLastId();
    }

    public function save()
    {
        if ($this->id == null) {
            $this->insert();
            return;
        }
        $existingModel = static::findById($this->id);
        if ($existingModel != null) {
            $this->update();
            return;
        }

        $this->insert();
    }

    public function delete()
    {
        $db = new Db;
        $data = ['table' => static::TABLE];
        $sql = 'DELETE FROM ' . $data['table'] . ' WHERE id=:id';

        return $db->execute($sql, [':id' => $this->id]);
    }

    /**
     * @throws Errors
     */
    public function fill(array $data)
    {
        $errors = new Errors();
        $props = get_object_vars($this);
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $props)) {
                $this->$key = $value;
            } else {
                $errors->add(new FillException('Свойство ' . $key . ' не найдено!'));
            }

            $validationMethod = 'validate' . ucfirst($key);
            if (method_exists($this, $validationMethod)) {
                $validResult = $this->$validationMethod();
                if ($validResult) {
                    $errors->add($validResult);
                }
            }
        }
        if ($errors->all()) {
            throw $errors;
        }
    }
}