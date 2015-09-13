<?php
 // database connection
 define ("DB_HOST","localhost"); // set database host
 define ("DB_USER", "root"); // set database user
 define ("DB_PASS", ""); // set database password--- by default its empty string
 define ("DB_PORT", 3306); // set database port
 define ("DB_NAME", "ditcoursedb"); // set database name

 // actions on STUDENTS  
 define (" ACTION_GET_STUDENTS ", 1);
 define (" ACTION_GET_STUDENT ", 2);
 define (" ACTION_SEARCH_STUDENTS ", 3);
 define (" ACTION_ADD_STUDENT ", 4);
 define (" ACTION_UPDATE_STUDENT ", 5);
 define (" ACTION_DELETE_STUDENT ", 6);
 
 // actions on LECTURERS
 define ("ACTION_GET_LECTURERS ", 1);
 define (" ACTION_GET_LECTURER ", 2);
 define (" ACTION_SEARCH_LECTURERS ", 3);
 define (" ACTION_ADD_LECTURERS ", 4);
 define (" ACTION_UPDATE_LECTURERS ", 5);
 define (" ACTION_DELETE_LECTURERS ", 6);   //
 
 // actions on COURSES 
 define ("ACTION_GET_COURSES ", 1);
 define (" ACTION_GET_COURSE ", 2);
 define (" ACTION_SEARCH_COURSES ", 3);
 define (" ACTION_ADD_COURSES ", 4);
 define (" ACTION_UPDATE_COURSES ", 5);
 define (" ACTION_DELETE_COURSES ", 6);
 
 // actions on NATIONALITIES
 define ("ACTION_GET_NATIONALITIES ", 1);
 define (" ACTION_GET_NATIONALITIE ", 2);
 define (" ACTION_SEARCH_NATIONALITIES ", 3);
 define (" ACTION_ADD_NATIONALITIES ", 4);
 define (" ACTION_UPDATE_NATIONALITIES ", 5);
 define (" ACTION_DELETE_NATIONALITIES ", 6);
 
 // actions on TASKS 
 define ("ACTION_GET_TASKS ", 1);
 define (" ACTION_GET_TASK ", 2);
 define (" ACTION_SEARCH_TASKS ", 3);
 define (" ACTION_ADD_TASKS ", 4);
 define (" ACTION_UPDATE_TASKS ", 5);
 define (" ACTION_DELETE_TASKS ", 6);
 
 
 // HTTP status codes 
 define ("HTTPSTATUS_OK", 200) ;
 define ("HTTPSTATUS_CREATED", 201) ;
 define ("HTTPSTATUS_NOCONTENT", 204) ;
 define ("HTTPSTATUS_BADREQUEST", 400) ;
 define ("HTTPSTATUS_NOTFOUND",404) ;
 define ("HTTPSTATUS_INTSERVERERR",500) ;
 ?>