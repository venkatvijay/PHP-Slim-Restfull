<?php
 class restfullController {
 public$model , $slimApp ;

 public function __construct ($model , $action =null , $slimApp ,   // constructor to initiate the object 
$parameteres = null ){
 $this -> model = $model ;
 $this -> slimApp = $slimApp ;
 $requestPar = $this -> slimApp -> request () -> params ();
 if ( $action != null ) {
 
 // switch looping statement to check the input from the user 
 switch ( $action ) {
 case ACTION_GET_STUDENTS : $this -> getstudents ();
 break ;
 case ACTION_GET_STUDENT : $this -> getstudent ( $parameteres );
 break ;
 case ACTION_SEARCH_STUDENTS : $this -> findstudentsByString (
$parameteres );
 break ;
 case ACTION_ADD_STUDENT : $this -> addUpdatestudent (
$parameteres , false );
 break ;
 case ACTION_UPDATE_STUDENT : $this -> addUpdatestudent (
$parameteres , true );
 break ;
 case ACTION_DELETE_STUDENT : $this -> deletestudent (
$parameteres );
case ACTION_GET_LECTURERS : $this -> getlecturers ();
 break ;
 case ACTION_GET_LECTURER : $this -> getlecturer ( $parameteres );
 break ;
 case ACTION_SEARCH_LECTURERS : $this -> findlecturersByString (
$parameteres );
 break ;
 case ACTION_ADD_LECTURER : $this -> addUpdatelecturer (
$parameteres , false );
 break ;
 case ACTION_UPDATE_LECTURER : $this -> addUpdatelecturer (
$parameteres , true );
 break ;
 case ACTION_DELETE_LECTURER : $this -> deletelecturer (
$parameteres );
case ACTION_GET_COURSES : $this -> getcourses ();
 break ;
 case ACTION_GET_COURSE : $this -> getcourse ( $parameteres );
 break ;
 case ACTION_SEARCH_COURSES : $this -> findcoursesByString (
$parameteres );
 break ;
 case ACTION_ADD_COURSE : $this -> addUpdatecourse (
$parameteres , false );
 break ;
 case ACTION_UPDATE_COURSE : $this -> addUpdatecourse (
$parameteres , true );
 break ;
 case ACTION_DELETE_COURSE : $this -> deletecourse (
$parameteres );
case ACTION_GET_NATIONALITIES : $this -> getnationalities ();
 break ;
 case ACTION_GET_NATIONALITIE : $this -> getnationalitie ( $parameteres );
 break ;
 case ACTION_SEARCH_NATIONALITIES : $this -> findnationalitiesByString (
$parameteres );
 break ;
 case ACTION_ADD_NATIONALITIE : $this -> addUpdatenationalitie (
$parameteres , false );
 break ;
 case ACTION_UPDATE_NATIONALITIE : $this -> addUpdatenationalitie (
$parameteres , true );
 break ;
 case ACTION_DELETE_NATIONALITIE : $this -> deletenationalitie (
$parameteres );
 break ;
 case ACTION_GET_TASKS : $this -> gettasks ();
 break ;
 case ACTION_GET_TASK : $this -> gettask ( $parameteres );
 break ;
 case ACTION_SEARCH_TASKS : $this -> findtasksByString (
$parameteres );
 break ;
 case ACTION_ADD_TASK : $this -> addUpdatetask (
$parameteres , false );
 break ;
 case ACTION_UPDATE_TASK : $this -> addUpdatetask (
$parameteres , true );
 break ;
 case ACTION_DELETE_TASK : $this -> deletetask (
$parameteres );
 default :
 }
 }
 }
public function getstudents (){                                            // get the list of all students 
 $this ->model -> apiResponse = $this ->model -> getstudents ();
 if ( count ($this ->model -> apiResponse ) ==0)
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOCONTENT );
 else
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 }

 public function getstudent ( $parameters ){                             // get only one student by student id 
 $id = $parameters ["student_number"];
 if ( isset ( $student_number )){
 if ( is_numeric ( $student_number)){
 if($this ->model -> isstudentExisting ( $student_number)){
 $this ->model -> apiResponse = $this ->model -> getstudent ( $student_number);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
 }
 else {
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_BADREQUEST );
 return ;
 }
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }

 public function findstudentsByString ( $parameters ){                                  // searches the student by the user given input 
 $query = $parameters [" query "];
 $this ->model -> apiResponse = $this ->model -> findstudentsByString ( $query );
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 }
public function addUpdatestudent ( $parameters , $isUpdate = false ){                   // update the student 

 $inputJson = $parameters [" json "];
 if ( isset ( $inputJson )){
 $jo = json_decode ( $inputJson , true ); // decoding json string to ass. array
 if ( isset ( $jo[" student_number "]) && isset ( $jo[" age "]) && isset ( $jo[" id_nationality "]) ){
 if ( is_numeric ( $jo [" student_number "])){
 if ( $isUpdate ){
 if ( isset ( $parameters ["student_number"])){
 $student_number = $parameters ["student_number"];
 if ($this ->model -> isstudentsExisting ( $student_number)){
 $student_number = $this ->model -> updatestudents ($student_number , $jo [" student_number "],
 $jo[" age "], $jo [" id_nationality "]);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
else $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 }
 else {
 $id = $this ->model -> addstudents ( $jo [" student_number "],$jo [" age "],
 $jo[" id_nationality "]);
 if ( $student_number ){
 $jsonResponse [" Location "] = " students/ $student_number";
 $this ->model -> apiResponse = $jsonResponse ;
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_CREATED );
 return ;
 }
 }
 }
 }
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_BADREQUEST );
 }
}

  function deletestudents ( $parameters ){                         // delete the student with student number  
 $student_number = $parameters ["student_number"];

 if ($this ->model -> isstudentExisting ($student_number)){
 $this ->model -> deletestudent ( $student_number);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
  function findlecturersByString ( $parameters ){                  // find the lecture by string query
 $query = $parameters [" query "];
 $this ->model -> apiResponse = $this ->model -> findlecturersByString ( $query );
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 }
 function addUpdatelecturer ( $parameters , $isUpdate = false ){      // update the lecturer table 

 $inputJson = $parameters [" json "];
 if ( isset ( $inputJson )){
 $jo = json_decode ( $inputJson , true ); // decoding json string to ass. array
 if ( isset ( $jo[" id "]) && isset ( $jo[" name "])  ){
 if ( is_numeric ( $jo [" id "])){
 if ( $isUpdate ){
 if ( isset ( $parameters ["id"])){
 $id = $parameters ["id"];
 if ($this ->model -> islecturersExisting ( $id)){
 $id = $this ->model -> updatelecturers ($id , $jo [" id "],
 $jo[" name "]);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
else $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 }
 else {
 $id = $this ->model -> addlecturers ( $jo [" id "],$jo [" name "]
 );
 if ( $id ){
 $jsonResponse [" Location "] = " lecturers/ $id";
 $this ->model -> apiResponse = $jsonResponse ;
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_CREATED );
 return ;
 }
 }
 }
 }
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_BADREQUEST );
 }


  function deletelecturer ( $parameters ){         // delete the lecture based on parameters from the user          
 $id = $parameters ["id"];

 if ($this ->model -> islecturerExisting ($id)){
 $this ->model -> deletelecturer ( $id);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 
 function findcoursesByString ( $parameters ){         // display the course by string to the user 
 $query = $parameters [" query "];
 $this ->model -> apiResponse = $this ->model -> findcoursesByString ( $query );
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 }
 function addUpdatecourse ( $parameters , $isUpdate = false ){  // add or update the course from the user  

 $inputJson = $parameters [" json "];
 if ( isset ( $inputJson )){
 $jo = json_decode ( $inputJson , true ); // decoding json string to ass. array
 if ( isset ( $jo[" id_course "]) && isset ( $jo[" description "])  && isset ( $jo[" lecture_id "])){
 if ( is_numeric ( $jo [" id_course "])){
 if ( $isUpdate ){
 if ( isset ( $parameters ["id_course"])){
 $id_course = $parameters ["id_course"];
 if ($this ->model -> iscoursesExisting ( $id_course)){
 $id_course = $this ->model -> updatecourses ($id_course , $jo [" id_course "],
 $jo[" description "],$jo [" lecture_id "]);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
else $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 }
 else {
 $id_course = $this ->model -> addcourses ( $jo [" id_course "],$jo [" description "],$jo [" lecture_id "]
 );
 if ( $id_course ){
 $jsonResponse [" Location "] = " courses/ $id_course";
 $this ->model -> apiResponse = $jsonResponse ;
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_CREATED );
 return ;
 }
 }
 }
 }
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_BADREQUEST );
 }


  function deletecourses ( $parameters ){ // delete the course where course id is equal to user parameters  
 $id_course = $parameters ["id_course"];

 if ($this ->model -> iscourseExisting ($id_course)){
 $this ->model -> deletecourse ( $id_course);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }

 function findnationalitiesByString ( $parameters ){   // display all nationalities form the table 
 $query = $parameters [" query "];
 $this ->model -> apiResponse = $this ->model -> findnationalitiesByString ( $query );
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 }
 function addUpdatenationalitie ( $parameters , $isUpdate = false ){ // update the nationalitie  

 $inputJson = $parameters [" json "];
 if ( isset ( $inputJson )){
 $jo = json_decode ( $inputJson , true ); // decoding json string to ass. array
 if ( isset ( $jo[" id "]) && isset ( $jo[" description "])  ){
 if ( is_numeric ( $jo [" id "])){
 if ( $isUpdate ){
 if ( isset ( $parameters ["id"])){
 $id = $parameters ["id"];
 if ($this ->model -> isnationalitiesExisting ( $id)){
 $id = $this ->model -> updatenationalities ($id , $jo [" id "],
 $jo[" description "]);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
else $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 }
 else {
 $id = $this ->model -> addnationalities ( $jo [" id "],$jo [" description "]
 );
 if ( $id ){
 $jsonResponse [" Location "] = " nationalities/ $id";
 $this ->model -> apiResponse = $jsonResponse ;
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_CREATED );
 return ;
 }
 }
 }
 }
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_BADREQUEST );
 }


  function deletenationalities ( $parameters ){   // delete the nationalitie where id is the primary key to delete the columns 
 $id = $parameters ["id"];

 if ($this ->model -> isnationalitieExisting ($id)){
 $this ->model -> deletenationalitie ( $id);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 
 function findtasksByString ( $parameters ){   // display all the tasks from the task table 
 $query = $parameters [" query "];
 $this ->model -> apiResponse = $this ->model -> findtasksByString ( $query );
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 }
 function addUpdatetask ( $parameters , $isUpdate = false ){ // function for adding or updating task

 $inputJson = $parameters [" json "];
 if ( isset ( $inputJson )){
 $jo = json_decode ( $inputJson , true ); // decoding json string to ass. array
 if ( isset ( $jo[" task_id "]) && isset ( $jo[" description "])  && isset ( $jo[" date "]) && isset ( $jo[" duration_mins "]) && isset ( $jo[" daytime "]) && isset ( $jo[" course_id "])){
 if ( is_numeric ( $jo [" task_id "])){
 if ( $isUpdate ){
 if ( isset ( $parameters ["task_id"])){
 $task_id = $parameters ["task_id"];
 if ($this ->model -> istasksExisting ( $task_id)){
 $task_id = $this ->model -> updatetasks ($task_id , $jo [" task_id "],
 $jo[" description "],$jo [" date "] , $jo[" duration_mins "] , $jo[" daytime "] , $jo[" course_id "] );
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
else $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 }
 else {
 $task_id = $this ->model -> addtasks ( $jo [" task_id "],$jo [" description "],$jo [" date "] , $jo[" duration_mins "] , $jo[" daytime "] , $jo[" course_id "]
 );
 if ( $task_id ){
 $jsonResponse [" Location "] = " tasks/ $task_id";
 $this ->model -> apiResponse = $jsonResponse ;
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_CREATED );
 return ;
 }
 }
 }
 }
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_BADREQUEST );
 }


  function deletetasks ( $parameters ){            // delete a row in task table by task id 
 $task_id = $parameters ["task_id"];

 if ($this ->model -> istaskExisting ($task_id)){
 $this ->model -> deletetask ( $task_id);
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_OK );
 return ;
 }
 $this -> slimApp -> response -> setStatus ( HTTPSTATUS_NOTFOUND );
 }
 
 ?>