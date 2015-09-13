<?php
 include_once "./conf/config.inc.php";
 include_once "./db/DAO_factory.php";
 //include_once "validation_factory.php";

 class restfullModel {
 public $DAO_Factory , $validationFactory ; // factories
 public $restfullDAO ; // DAOs
 public $apiResponse ;

 public function __construct (){
 $this -> DAO_Factory = new DAO_Factory ();
 $this -> DAO_Factory -> initDBResources ();
 $this -> restfullDAO = $this -> DAO_Factory -> getrestfullDAO ();
// $this -> validationFactory = new validation_factory ();
 }

 public function isstudentsExisting ($student_number){                     // returns student if exist with the student number 
 return ($this -> restfullDAO -> isstudentExisting ($student_number ));
 }

 public function getstudent (){                                          // returns list of all students 
 $studentsList = $this -> restfullDAO -> getstudents ();
 return $studentsList ;
 }

 public function getstudents ($student_number){                                    // returns list of students with student number 
 $studentsDetail = $this -> restfullDAO -> getstudentsById ($student_number );
 return $studentsDetail [0];
 }
public function findstudentsByString ( $str ){                              // returns list of students by string 
 $studentsList = $this -> restfullDAO -> findstudentsByString (
$str );
 return $studentsList ;
 }

 public function addstudents ($student_number , $age , $id_nationality) {     // returns the inserted values of students 
 return ($this -> restfullDAO -> insertstudents ( $student_number , $age , $id_nationality ));
 }

 public function updatestudents ($student_number , $age , $id_nationality ) {            // returns the updated list
 return ($this -> restfullDAO -> updatestudents ($student_number , $age , $id_nationality ));
 }

 public function deletestudents ($student_number){                        // does not return anything 
 $this -> restfullDAO -> deletestudents ($student_number);
 }
 public function islecturersExisting ($id){                              // returns the existing lecturer 
 return ($this -> restfullDAO -> islecturersExisting ($id ));
 }

 public function getlecturers (){                                      // returns all lecturers
 $lecturersList = $this -> restfullDAO -> getlecturers ();
 return $lecturersList ;
 }

 public function getlecturer ($id){                                  // returns lecture by id 
 $lecturersDetail = $this -> restfullDAO -> getlecturersById ($id );
 return $lecturersDetail [0];
 }
public function findlecturersByString ( $str ){                           // returns lecture by string passed
 $lecturersList = $this -> restfullDAO -> findlecturersByString (
$str );
 return $lecturersList ;
 }

 public function addlecturers ($id , $name) {                            // returns new added lectures 
 return ($this -> restfullDAO -> insertlecturers ( $id , $name ));
 }

 public function updatelecturers ($id , $name ) {                     // returns updated lecturers 
 return ($this -> restfullDAO -> updatelecturers ($id , $name ));
 }

 public function deletelecturers ($id){
 $this -> restfullDAO -> deletelecturers ($id);
 }
 public function iscoursesExisting ($id_course){                       // returns course list 
 return ($this -> restfullDAO -> iscoursesExisting ($id_course ));
 }

 public function getcourses (){                                   // returns all course list 
 $coursesList = $this -> restfullDAO -> getcourses ();
 return $coursesList ;
 }

 public function getcourse ($id_course){                                             // returns course list by id 
 $coursesDetail = $this -> restfullDAO -> getcoursesByid_course ($id_course );
 return $coursesDetail [0];
 }
public function findcoursesByString ( $str ){
 $coursesList = $this -> restfullDAO -> findcoursesByString (
$str );
 return $coursesList ;
 }

 public function addcourses ($id_course , $description , $lecture_id) {                      // returns added course list 
 return ($this -> restfullDAO -> insertcourses ( $id_course , $description , $lecture_id ));
 }

 public function updatecourses ($id_course , $description , $lecture_id ) {                 // returns updated course list 
 return ($this -> restfullDAO -> updatecourses ($id_course , $description , $lecture_id ));
 }

 public function deletecourses ($id_course){
 $this -> restfullDAO -> deletecourses ($id_course);
 }
 public function isnationalitiesExisting ($id){                      // returns nationality list if exist 
 return ($this -> restfullDAO -> isnationalitiesExisting ($id ));
 }

 public function getnationalities (){                                      // returns all nationality list 
 $nationalitiesList = $this -> restfullDAO -> getnationalities ();
 return $nationalitiesList ;
 }

 public function getnationalitie ($id){                                            // returns nationalities with id 
 $nationalitiesDetail = $this -> restfullDAO -> getnationalitiesByid ($id );
 return $nationalitiesDetail [0];
 }
public function findnationalitiesByString ( $str ){                                
 $nationalitiesList = $this -> restfullDAO -> findnationalitiesByString (
$str );
 return $nationalitiesList ;
 }

 public function addnationalities ($id , $description) {
 return ($this -> restfullDAO -> insertnationalities ( $id , $description ));    // return added nationalities 
 }

 public function updatenationalities ($id , $description  ) {
 return ($this -> restfullDAO -> updatenationalities ($id , $description  ));     // returns updated nationalities 
 }

 public function deletenationalities ($id){
 $this -> restfullDAO -> deletenationalities ($id);
 }
 public function istasksExisting ($task_id){                       // returns if task existing in table
 return ($this -> restfullDAO -> istasksExisting ($task_id ));
 }

 public function gettasks (){                                         // returns all tasks 
 $tasksList = $this -> restfullDAO -> gettasks ();
 return $tasksList ;
 }

 public function gettask ($task_id){                                  // returns tasks with specific id
 $tasksDetail = $this -> restfullDAO -> gettasksBytask_id ($task_id );
 return $tasksDetail [0];
 }
public function findtasksByString ( $str ){                           //returns task by string 
 $tasksList = $this -> restfullDAO -> findtasksByString (
$str );
 return $tasksList ;
 }

 public function addtasks ($task_id , $description , $date , $duration_mins , $daytime , $course_id) {  //   returns added task 
 return ($this -> restfullDAO -> inserttasks ( $task_id , $description , $date , $duration_mins , $daytime , $course_id ));
 }

 public function updatetasks ($task_id , $description , $date , $duration_mins , $daytime , $course_id ) {   // returns the updated task 
 return ($this -> restfullDAO -> updatetasks ($task_id , $description , $date , $duration_mins , $daytime , $course_id  ));
 }

 public function deletetasks ($task_id){
 $this -> restfullDAO -> deletetasks ($task_id);
 }
 public function __destruct (){
 $this -> DAO_Factory -> clearDBResources ();
 }
 }
 ?>