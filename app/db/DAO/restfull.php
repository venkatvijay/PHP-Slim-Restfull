<?php
 require_once("dao.php");
 class restfullDAO extends BaseDAO {
 function messagesDAO ( $dbMng ) {
 parent::BaseDAO ( $dbMng );
 }
// check the existing of the student with the student number 
 public function isstudentsExisting ($student_number){
 $sqlQuery = "SELECT count (*) as isExisting ";
 $sqlQuery .= "FROM students ";
 $sqlQuery .= "WHERE student_number= $student_number";
 $result = $this -> getDbManager() -> executeSelectQuery ( $sqlQuery );
 if ( $result [0][ " isExisting "] == 1) return ( true );
 else return ( false );
 }
// get all students 
 public function getstudents (){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM students ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
// get the student by id
 public function getstudentById ($student_number){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM students ";
 $sqlQuery .= " WHERE student_number=’ $student_number ’ ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
 // search the student by the id_nationality 
public function findstudentsByString ( $str ){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM students ";
 $sqlQuery .= " WHERE id_nationality LIKE ’% $str %’";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
// insert new values into the students 
 public function insertstudents ($student_number , $age ,$id_nationality ){
 $sqlQuery = " INSERT INTO students (student_number , age , id_nationality ) ";
 $sqlQuery .= " VALUES (’ $student_number ’, ’$age ’, ’$id_nationality’)";
 $result = $this -> getDbManager () -> executeInsertQuery ( $sqlQuery );
 return $result ;
 }
// update students with new values 
 public function updatestudents ($student_number , $newage , $newnationality
 ){
 $sqlQuery = " UPDATE students SET student_number =’ $student_number ’, age =’
$newage ’, id_nationality =’ $newnationality ’";
 $sqlQuery .= " WHERE student_number= $student_number";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
// delete students with the student number 
 public function deletestudents ($student_number) {
 $sqlQuery = " DELETE FROM students ";
 $sqlQuery .= " WHERE student_number= $student_number";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
 // check the existing of the lecture with the id  
 public function islecturersExisting ($id){
 $sqlQuery = "SELECT count (*) as isExisting ";
 $sqlQuery .= "FROM lecturers ";
 $sqlQuery .= "WHERE id= $id";
 $result = $this -> getDbManager() -> executeSelectQuery ( $sqlQuery );
 if ( $result [0][ " isExisting "] == 1) return ( true );
 else return ( false );
 }
// get all lecturers 
 public function getlecturers (){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM lecturers ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
// list the lecture by the id 
 public function getlectureById ($id){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM lecturers ";
 $sqlQuery .= " WHERE id=’ $id ’ ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
 // search for the lecture by string
public function findlecturersByString ( $str ){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM lecturers ";
 $sqlQuery .= " WHERE name LIKE ’% $str %’";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
 // insert lecturers into the table  
 public function insertlecturers ($id , $name ){
 $sqlQuery = " INSERT INTO lecturers (id , name ) ";
 $sqlQuery .= " VALUES (’ $id ’, ’$name')";
 $result = $this -> getDbManager () -> executeInsertQuery ( $sqlQuery );
 return $result ;
 }
  // update the lecture based on id 
 public function updatelecturers ($id , $name
 ){
 $sqlQuery = " UPDATE lecturers SET id =’ $id ’, name =’
$name ’";
 $sqlQuery .= " WHERE id= $id";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
 // delete the lecture 
 public function deletelecturers ($id) {
 $sqlQuery = " DELETE FROM lecturers ";
 $sqlQuery .= " WHERE id= $id";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
  // check the existing of the course with the id_course 
public function iscoursesExisting ($id_course){
 $sqlQuery = "SELECT count (*) as isExisting ";
 $sqlQuery .= "FROM courses ";
 $sqlQuery .= "WHERE id_course= $id_course";
 $result = $this -> getDbManager() -> executeSelectQuery ( $sqlQuery );
 if ( $result [0][ " isExisting "] == 1) return ( true );
 else return ( false );
 }
  // list all courses
 public function getcourses (){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM courses ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
 // list the course by course id 
 public function getcoursesByid_course ($id_course){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM courses ";
 $sqlQuery .= " WHERE id_course=’ $id_course ’ ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
  // search course by the string inputs 
public function findcoursesByString ( $str ){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM courses ";
 $sqlQuery .= " WHERE description LIKE ’% $str %’";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
     // add new course in the table
 public function insertcourses ($id_course ,$description , $lecture_id ){
 $sqlQuery = " INSERT INTO courses (id_course , description , lecture_id  ) ";
 $sqlQuery .= " VALUES (’ $id_course ’, ’$description' , 'lecture_id')";
 $result = $this -> getDbManager () -> executeInsertQuery ( $sqlQuery );
 return $result ;
 }
// updating the columns in course table
 public function updatecourses ($id_course , $description , lecture_id
 ){
 $sqlQuery = " UPDATE courses SET id_course =’ $id_course ’, description =’
$description ’, lecture_id='$lecture_id'";
 $sqlQuery .= " WHERE id_course= $id_course";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
// delete the course where course is equal to course id from user 
 public function deletecourses ($id_course) {
 $sqlQuery = " DELETE FROM courses ";
 $sqlQuery .= " WHERE id_course= $id_course";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
  // function to check the existence of nationality 
 public function isnationalitiesExisting ($id){
 $sqlQuery = "SELECT count (*) as isExisting ";
 $sqlQuery .= "FROM nationalities ";
 $sqlQuery .= "WHERE id= $id";
 $result = $this -> getDbManager() -> executeSelectQuery ( $sqlQuery );
 if ( $result [0][ " isExisting "] == 1) return ( true );
 else return ( false );
 }
 // diaplay all nationality 
 public function getnationalities (){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM nationalities ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
 // display the nationality by id 
 public function getnationalityByid ($id){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM nationalities ";
 $sqlQuery .= " WHERE id=’ $id ’ ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
  // search the nationality by description 
public function findnationalitiesByString ( $str ){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM nationalities ";
 $sqlQuery .= " WHERE description LIKE ’% $str %’";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
  // add the nationality into the table  
 public function insertnationalities ($id ,$description ){
 $sqlQuery = " INSERT INTO nationalities (id , description   ) ";
 $sqlQuery .= " VALUES (’ $id ’, ’$description' )";
 $result = $this -> getDbManager () -> executeInsertQuery ( $sqlQuery );
 return $result ;
 }
  // restructure the nationality in the column 

 public function updatenationalities ($id , $description 
 ){
 $sqlQuery = " UPDATE nationalities SET id =’ $id ’, description =’
$description ’";
 $sqlQuery .= " WHERE id= $id";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
 // delete the nationality from the id from the user 
 public function deletenationalities ($id) {
 $sqlQuery = " DELETE FROM nationalities ";
 $sqlQuery .= " WHERE id= $id";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
  // check the task is existing or not 
 public function istasksExisting ($task_id){
 $sqlQuery = "SELECT count (*) as isExisting ";
 $sqlQuery .= "FROM tasks ";
 $sqlQuery .= "WHERE task_id= $task_id";
 $result = $this -> getDbManager() -> executeSelectQuery ( $sqlQuery );
 if ( $result [0][ " isExisting "] == 1) return ( true );
 else return ( false );
 }
 // display all tasks 
 public function gettasks (){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM tasks ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
  // display the task based on the task id 

 public function gettaskBytask_id ($task_id){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM tasks ";
 $sqlQuery .= " WHERE task_id=’ $task_id ’ ";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
 // search the task by string in the table 
public function findtasksByString ( $str ){
 $sqlQuery = " SELECT * ";
 $sqlQuery .= " FROM tasks ";
 $sqlQuery .= " WHERE description LIKE ’% $str %’";
 $result = $this -> getDbManager () -> executeSelectQuery ( $sqlQuery );
 return ( $result );
 }
// add the new tasks in the table 
 public function inserttasks ($task_id ,$description , $date , $duration_mins , $daytime , $course_id ){
 $sqlQuery = " INSERT INTO tasks (task_id , description , date, duration_mins ,daytime ,  course_id ) ";
 $sqlQuery .= " VALUES (’ $task_id ’, ’$description' , '$date' , '$duration_mins' , '$daytime' , '$course_id')";
 $result = $this -> getDbManager () -> executeInsertQuery ( $sqlQuery );
 return $result ;
 }
// alter the table 
 public function updatetasks ($task_id ,$description , $date , $duration_mins , $daytime , $course_id 
 ){
 $sqlQuery = " UPDATE tasks SET task_id =’ $task_id ’, description =’
$description ’, date='$date' , duration_mins = '$duration_mins' , daytime = '$daytime' , course_id = '$course_id '";
 $sqlQuery .= " WHERE task_id= $task_id";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
// delete the task from table based on task id 
 public function deletetasks ($task_id) {
 $sqlQuery = " DELETE FROM tasks ";
 $sqlQuery .= " WHERE task_id= $task_id";
 $result = $this -> getDbManager () -> executeQuery ( $sqlQuery );
 return $result ;
 }
 
 }