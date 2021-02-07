<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home']='Home';
$route['services']='Home/services';
$route['about-us']='Home/about';
$route['contact-us']='Home/contact';


$route['tuition-sign-in']='Tuition';
$route['tuition-sign-up']='Tuition/register';
$route['tuition-dashboard']='Tuition/dashboard';
$route['edit-tuition-profile']='Tuition/editProfile';
$route['tuition-classes']='Tuition/viewClasses';
$route['add-tuition-classes']='Tuition/addClasses';
$route['change-password']='Tuition/changePassword';
$route['add-tuition-teacher']='Tuition/addTeacher';
$route['tuition-teacher-list']='Tuition/teacherList';
$route['add-tuition-student']='Tuition/addStudent';
$route['tuition-student-list']='Tuition/studentList';
$route['tuition-logout']='Tuition/logout';
$route['image-edit']='Tuition/imageEdit';
$route['student-attendance']='Tuition/studentAttendance';
$route['view-student-attendance']='Tuition/viewStudentAttendance';
$route['announcements'] = 'Tuition/announcements';


$route['teacher/teacher-sign-in']='Teacher';
$route['teacher/teacher-dashboard']='Teacher/dashboard';
$route['teacher/edit-teacher-profile']='Teacher/editTeacherProfile';
$route['teacher/student-attendance']='Teacher/studentAttendance';
$route['teacher/view-student-attendance']='Teacher/viewStudentAttendance';
$route['teacher/student-list']='Teacher/studentList';
$route['teacher/class-list']='Teacher/classList';
$route['teacher/teacher-query']='Teacher/teacherQuery';
$route['teacher/change-password']='Teacher/changePassword';
$route['teacher/teacher-logout']='Teacher/teacherLogout';


$route['student/student-sign-in']='Student';
$route['student/student-dashboard']='Student/dashboard';
$route['student/edit-student-profile']='Student/editStudentProfile';
$route['student/view-student-attendance']='Student/viewStudentAttendance';
$route['student/view-announcements']='Student/viewAnnouncements';
$route['student/student-query']='Student/studentQuery';
$route['student/change-password']='Student/changePassword';
$route['student/student-logout']='Student/studentLogout';


$route['admin']='Admin';
$route['admin/admin-dashboard']='Admin/dashboard';
$route['admin/edit-admin-profile']='Admin/editAdminProfile';
$route['admin/view-tuition-list']='Admin/viewTuitionList';
$route['admin/view-teacher-list']='Admin/viewTeacherList';
$route['admin/view-student-list']='Admin/viewStudentList';
$route['admin/view-all-message']='Admin/viewAllMessage';
$route['admin/change-password']='Admin/changePassword';
$route['admin/admin-logout']='Admin/adminLogout';
