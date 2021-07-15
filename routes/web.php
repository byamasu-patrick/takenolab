<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/course/{id}', [App\Http\Controllers\HomeController::class, 'course_detail']);
Route::get('/enroll', [App\Http\Controllers\HomeController::class, 'enroll']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User defined routes and controllers for managing authentication
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/accounts', [App\Http\Controllers\AdminController::class, 'accounts'])->name('admin');
Route::get('/admin/accounts/{id}',  [App\Http\Controllers\AdminController::class, 'accounts_edit'])->name('admin');
Route::post('/admin/accounts/edit', [App\Http\Controllers\AdminController::class, 'edit_account']);
Route::get('/admin/accounts/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_account']);
Route::get('/admin/accounts/view/{id}', [App\Http\Controllers\AdminController::class, 'getUserById']);
Route::get('/admin/courses/teachers', [App\Http\Controllers\AdminController::class, 'getTeachers'])->name('admin');
// Administrator's courses routes
Route::get('/admin/courses', [App\Http\Controllers\CourseController::class, 'courses'])->name('admin');
//Route::get('/admin/courses/{id}', [App\Http\Controller\CourseController::class, 'course'])->name('admin');
Route::post('/admin/courses/{id}/visibility', [App\Http\Controllers\CourseController::class, 'course_visibility'])->name("admin");
Route::get('/admin/courses/course_details',  [App\Http\Controllers\CourseController::class, 'course_details'])->name('admin');
Route::post('/admin/courses/create_topics',  [App\Http\Controllers\TopicController::class, 'create'])->name('admin');
Route::post('/admin/courses', [App\Http\Controllers\CourseController::class, 'create'])->name('admin');
Route::get('/admin/courses/assign/{id}', [App\Http\Controllers\CourseController::class, 'assign_teacher'])->name('admin');
Route::get('/admin/courses/course_materials', [App\Http\Controllers\AdminController::class, 'view_course_details'])->name('admin');
Route::get('/admin/{id}/enrolled-student', [App\Http\Controllers\CourseController::class, 'getEnrolledStudent'])->name("admin");
// Adding new video materials for a specific topic and subtopic
Route::post('/admin/courses/course_materials', [App\Http\Controllers\AdminController::class, 'create_lessons'])->name('admin');


Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
//Setting up the routes for teachers
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');
Route::get('/teacher/account/{id}', [App\Http\Controllers\TeacherController::class, 'account'])->name('teacher');
Route::get('/teacher/courses-taught', [App\Http\Controllers\TeacherController::class, 'courses_taught'])->name('teacher');
Route::get('/teacher/terms-and-conditions', [App\Http\Controllers\TeacherController::class, 'terms_and_conditions'])->name('teacher');
Route::post('/teacher/account/edit', [App\Http\Controllers\TeacherController::class, 'edit_account'])->name('teacher');
Route::post('/teacher/profile/edit', [App\Http\Controllers\TeacherController::class, 'change_profile'])->name('teacher');
Route::get('/teacher/courses', [App\Http\Controllers\TeacherController::class, 'view_courses'])->name('teacher');
Route::get('/teacher/courses/view', [App\Http\Controllers\TeacherController::class, 'view_course_details'])->name('teacher');
Route::get('/teacher/courses/teach', [App\Http\Controllers\TeacherController::class, 'teach_course_details'])->name("teacher");
Route::post('/admin/courses/teach/discussion', [App\Http\Controllers\DiscussionForumController::class, 'create_discusssion_topic'])->name('teacher');
Route::post('/courses/teach/discussion/comments', [App\Http\Controllers\DiscussionCommentsController::class, 'create_discusssion_comment'])->name("teacher");
Route::post('/teacher/courses/course_materials', [App\Http\Controllers\AdditionalCourseMaterialsController::class, 'create_course_materials'])->name('teacher');
Route::post('/teacher/courses/create_assessement', [App\Http\Controllers\AssessmentBookController::class, 'create_assessement'])->name('teacher');

//Setting up the routes for student
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');         
Route::get('/student/courses', [App\Http\Controllers\StudentController::class, 'courses'])->name('student');
Route::get('/student/account/{id}', [App\Http\Controllers\StudentController::class, 'account'])->name('student');
Route::get('/student/courses/view', [App\Http\Controllers\StudentController::class, 'view_course_details'])->name('student');
Route::get('/student/courses/enroll', [App\Http\Controllers\EnrolledCoursesController::class, 'create'])->name('student');
Route::get('/student/courses/learn', [App\Http\Controllers\EnrolledCoursesController::class, 'learn'])->name('student');
Route::get('/student/explore', [App\Http\Controllers\EnrolledCoursesController::class, 'getAllCourses'])->name('student');
Route::post('/student/account/edit', [App\Http\Controllers\StudentController::class, 'edit_account'])->name('student');
Route::post('/student/profile/edit', [App\Http\Controllers\StudentController::class, 'change_profile'])->name('student');
Route::post('/student/courses/progress', [App\Http\Controllers\LearningProgressController::class, 'new_progress'])->name('student');
Route::get('/assessment/{id}/take', [App\Http\Controllers\QuizesController::class, 'index'])->name("student");
