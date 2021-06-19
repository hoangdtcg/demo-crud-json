<?php


class Data
{
    public static $path = "core/data.json";

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path,$dataJson);
    }

    public static function loadData()
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::covertToStudent($data);
    }

    public static function covertToStudent($data)
    {
        $students = [];
        foreach ($data as $item){
            $student = new Student($item->id,$item->name);
            array_push($students,$student);
        }
        return $students;
    }

    public static function addStudent($student)
    {
//        var_dump(self::$path);
//        die();
        $students = self::loadData();
        array_push($students,$student);
        self::saveData($students);
    }

    public static function getStudentById($id)
    {
        $students = self::loadData();
        foreach ($students as $student){
            if($student->getId() == $id){
                return $student;
            }
        }
    }

    public static function editStudentById($id,$newStudent)
    {
        $students = self::loadData();
        foreach ($students as $student){
            if($student->getId() == $id){
                $student->setName($newStudent->getName());
            }
        }
        self::saveData($students);
    }
}
