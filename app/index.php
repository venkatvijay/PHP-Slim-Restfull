<?php
// load the Slim Framework
 require_once "../Slim/Slim/Slim.php";
 Slim\Slim::registerAutoloader();

// Instantiate a Slim application
 $app = new Slim\Slim(array('debug' => true));
 $app = new \ Slim \ Slim ();

 include_once "./conf/config.inc.php";
 include_once "models/restfull_model.php";
 include_once "controllers/restfull_controller.php";
 include_once "views/restfull_view.php";

// Define the Slim application routes
 
 $app ->get ("/","welcomeFunction");
 function welcomeFunction (){
 echo " Restfull Api ";
 }
$app ->get ("/ students", function () use ( $app ){
 $MVC = new RESTFULLComponents("ACTION_GET_STUDENTS",$app);  // list all students
 });
 $app ->get ("/ lecturers", function () use ( $app ){
 $MVC = new RESTFULLComponents("ACTION_GET_LECTURERS",$app); // list all lecturers
 });
 $app ->get ("/ courses", function () use ( $app ){
 $MVC = new RESTFULLComponents("ACTION_GET_COURSES",$app); // list all courses
 });
 $app ->get ("/ nationalities", function () use ( $app ){
 $MVC = new RESTFULLComponents("ACTION_GET_NATIONALITIES",$app); // list all nationalities
 });
 $app ->get ("/ tasks", function () use ( $app ){
 $MVC = new RESTFULLComponents("ACTION_GET_TASKS",$app); // list all tasks
 });
 

 $app ->get ("/ students/:student_number", function ($student_number) use ( $app ){
 $parameters ["student_number"] = $student_number ;
 $MVC = new RESTFULLComponents(ACTION_GET_STUDENTS,$app,$parameters); // list only one student with the student number 
 });
 $app ->get ("/ lecturers/:id", function ($id) use ( $app ){
 $parameters ["id"] = $id ;
 $MVC = new RESTFULLComponents(ACTION_GET_LECTURERS,$app,$parameters); // list lecturer with the lecture id
 });
 $app ->get ("/ courses/:id_course", function ($id_course) use ( $app ){
 $parameters ["id_course"] = $id_course ;
 $MVC = new RESTFULLComponents(ACTION_GET_COURSES,$app,$parameters); // list course with course id
 });
 $app ->get ("/ nationalities/:id", function ($id) use ( $app ){
 $parameters ["id"] = $id ;
 $MVC = new RESTFULLComponents(ACTION_GET_NATIONALITIES,$app,$parameters); // list nationalities with id
 });
 $app ->get ("/ tasks/:task_id", function ($task_id) use ( $app ){
 $parameters ["task_id"] = $task_id ;
 $MVC = new RESTFULLComponents(ACTION_GET_TASKS,$app,$parameters); // list task with task id
 });
 

 $app ->get ("/ students/search/:query", function ( $query ) use ( $app ){
 $parameters [" query "] = $query ;
 $MVC = new RESTFULLComponents ( ACTION_SEARCH_STUDENTS , $app , $parameters ); // search API for students
 });
 $app ->get ("/ lecturers/search/:query", function ( $query ) use ( $app ){
 $parameters [" query "] = $query ;
 $MVC = new RESTFULLComponents ( ACTION_SEARCH_LECTURERS , $app , $parameters ); // search API for lecturers 
 });
 $app ->get ("/ courses/search/:query", function ( $query ) use ( $app ){
 $parameters [" query "] = $query ;
 $MVC = new RESTFULLComponents ( ACTION_SEARCH_COURSES , $app , $parameters ); // search API for courses
 });
 $app ->get ("/ nationalities/search/:query", function ( $query ) use ( $app ){
 $parameters [" query "] = $query ;
 $MVC = new RESTFULLComponents ( ACTION_SEARCH_NATIONALITIES , $app , $parameters ); // search API for nationalities 
 });
 $app ->get ("/ tasks/search/:query", function ( $query ) use ( $app ){
 $parameters [" query "] = $query ;
 $MVC = new RESTFULLComponents ( ACTION_SEARCH_TASKS , $app , $parameters ); // search API for tasks 
 });

 $app -> post ("/ students", function () use ( $app ){
 $parameters [" json "]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents ( ACTION_ADD_STUDENTS , $app , $parameters ); // insert values into students table
 });
 $app -> post ("/ lecturers", function () use ( $app ){
 $parameters [" json "]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents ( ACTION_ADD_LECTURERS , $app , $parameters ); // insert values into lecturers table 
 });
 $app -> post ("/ courses", function () use ( $app ){
 $parameters [" json "]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents ( ACTION_ADD_COURSES , $app , $parameters ); // insert values into courses table
 });
 $app -> post ("/ nationalities", function () use ( $app ){
 $parameters [" json "]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents ( ACTION_ADD_NATIONALITIES , $app , $parameters ); // insert values into nationalities 
 });
 $app -> post ("/ tasks", function () use ( $app ){
 $parameters [" json "]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents ( ACTION_ADD_TASKS , $app , $parameters ); // insert values into tasks 
 });
 

 $app ->put ("/ students/:student_number", function ($student_number) use ( $app ){
 $parameters ["student_number"]= $student_number;
 $parameters ["json"]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents (ACTION_UPDATE_STUDENTS , $app , $parameters ); // update students
 });
 $app ->put ("/ lecturers/:id", function ($id) use ( $app ){
 $parameters ["id"]= $id;
 $parameters ["json"]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents (ACTION_UPDATE_LECTURERS , $app , $parameters ); // update lecturers
 });
 $app ->put ("/ courses/:id_course", function ($id_course) use ( $app ){
 $parameters ["id_course"]= $id_course;
 $parameters ["json"]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents (ACTION_UPDATE_COURSES , $app , $parameters ); // update courses
 });
 $app ->put ("/ nationalities/:id", function ($id) use ( $app ){
 $parameters ["id"]= $id;
 $parameters ["json"]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents (ACTION_UPDATE_NATIONALITIES , $app , $parameters ); // update nationalities
 });
 $app ->put ("/ tasks/:task_id", function ($task_id) use ( $app ){
 $parameters ["task_id"]= $task_id;
 $parameters ["json"]= $app -> request -> getBody ();
 $MVC = new RESTFULLComponents (ACTION_UPDATE_TASKS , $app , $parameters ); // update tasks 
 });
 

 $app -> delete ("/ students/:student_number", function ($student_number) use ( $app ){
 $parameters ["student_number"]= $student_number;
 $MVC = new RESTFULLComponents ( ACTION_DELETE_STUDENTS,$app,$parameters ); // delete students with the user given student number  
 });
 $app -> delete ("/ lecturers/:id", function ($id) use ( $app ){
 $parameters ["id"]= $id;
 $MVC = new RESTFULLComponents ( ACTION_DELETE_LECTURERS,$app,$parameters ); // delete lecturers with the user given id
 });
 $app -> delete ("/ courses/:id_course", function ($id_course) use ( $app ){
 $parameters ["id_course"]= $id_course;
 $MVC = new RESTFULLComponents ( ACTION_DELETE_COURSES,$app,$parameters ); // delete courses with the user given id_course
 });
 $app -> delete ("/ nationalities/:id", function ($id) use ( $app ){
 $parameters ["id"]= $id;
 $MVC = new RESTFULLComponents ( ACTION_DELETE_NATIONALITIES,$app,$parameters ); // delete nationalities with the user given id
 });
 $app -> delete ("/ tasks/:task_id", function ($task_id) use ( $app ){
 $parameters ["task_id"]= $task_id;
 $MVC = new RESTFULLComponents ( ACTION_DELETE_TASKS,$app,$parameters ); // delete task with the user given task_id
 });
// set up common headers for every response
 $app -> response () -> header (" Content - Type ", " application / json ; charset =utf -8");

 // Run the slim framework(API).
 $app ->run ();

 class RESTFULLComponents {
 public function __construct ( $action , $app , $parameters = null ){
 $model = new restfullModel (); // common model
 $controller = new restfullController ($model , $action , $app , $parameters ); 
 //common controller with different actions
 $view = new restfullView ( $controller , $model , $app ); // common view
 $view -> output (); // this returns the response to the requesting client
 }
 }
 ?>