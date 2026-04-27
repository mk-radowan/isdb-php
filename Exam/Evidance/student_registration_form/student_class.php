<?php
//Step 1:
class Student
{
   private $id;
   private $name;
   private $course;


   private static $file_path = "data.txt";

   //---------------constructor---------------//
   function __construct($_id, $_name, $_course)
   {
      $this->id = $_id;
      $this->name = $_name;
      $this->course = $_course;
   }

   //---------------csv function-------------------//
   public function csv()
   {
      return $this->id . "," . $this->name . "," . $this->course . PHP_EOL;  //End Of Line or create new line 
   }

   //-----------save function-----------------//
   public function save()
   {


      file_put_contents(self::$file_path, $this->csv(), FILE_APPEND);
   }

   //---------------display_students-------------//

   public static function display_students()
   {

      if (!file_exists(self::$file_path)) {
         return;
      }

      $students = file(self::$file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


      if (empty($students)) {
         echo "Student list is empty.";
         return;
      }
      echo "<b>ID | Name | COURSE </b><br/>";
      foreach ($students as $student) {
         list($id, $name, $course) = explode(",", $student);
         echo "$id | $name | $course <br/>";
      }
   }



   //-----------------end functions----------------   

}
