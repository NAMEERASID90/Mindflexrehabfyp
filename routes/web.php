<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\appointmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\doctorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\priceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\testimonalsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PasswordResetController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/price', [priceController::class, 'price'])->name('price');
Route::get('/testimonals', [testimonalsController::class, 'testimonals'])->name('testimonals');
Route::get('/appointment', [appointmentController::class, 'appointment'])->name('appointment');
Route::get('/doctors', [doctorsController::class, 'doctors'])->name('doctors');
//admin
Route::get('/login', [AdminController::class, 'admin_login'])->name('login');
Route::post('/login', [AdminController::class, 'adminlogin'])->name('login');
Route::post('/adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');

Route::middleware('auth')->group(function () {
    Route::get('/adminhomepage', [AdminController::class, 'homepage'])->name('admin.homepage');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('/patients', [AdminController::class, 'index'])->name('patients.index');
    Route::get('/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patient/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::get('/doctorlist', [doctorsController::class, 'doctorlist'])->name('admin.doctorlist');
    Route::get('/createdoctor', [doctorsController::class, 'createdoctor'])->name('admin.createdoctor');
    Route::post('/doctorstore', [doctorsController::class, 'doctorstore'])->name('admin.doctorstore');
    Route::delete('/admin/doctors/{id}', [doctorsController::class, 'destroy'])->name('admin.deletedoctor');
    Route::get('/specialities', [SpecialitiesController::class, 'index'])->name('specialities.index');
    Route::post('/password/update', [AdminController::class, 'updatePassword'])->name('password.update');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/pprofile', [PatientController::class, 'profile'])->name('pprofile');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/adminappointment', [AdminController::class, 'adminappointment'])->name('admin.adminappointment');
    Route::get('/specialities', [SpecialityController::class, 'index'])->name('specialities.index');
    Route::post('/specialities/store', [SpecialityController::class, 'store'])->name('specialities.store');
    Route::post('/specialities/update/{id}', [SpecialityController::class, 'update'])->name('specialities.update');
    Route::post('/specialities/delete/{id}', [SpecialityController::class, 'destroy'])->name('specialities.destroy');


});

//doctor
Route::get('/doctorlogin', [doctorsController::class, 'doctorlogin'])->name('doctorlogin');
Route::middleware('auth')->group(function () {
    Route::get('/doctorhomepage', [doctorsController::class, 'doctorhomepage'])->name('doctorhomepage');
    Route::get('/chngepass', [doctorsController::class, 'chngepass'])->name('chngepass');
    Route::post('/password-update', [doctorsController::class, 'updatePassword'])->name('password.update');
    Route::get('/dprofile', [doctorsController::class, 'dprofile'])->name('dprofile');
    Route::get('/dappointment', [doctorsController::class, 'dappointment'])->name('dappointment');
    Route::get('/mypatient', [doctorsController::class, 'mypatient'])->name('mypatient');
    Route::get('/exercise', [doctorsController::class, 'exercise'])->name('exercise');
    Route::post('/save-shared-link', [doctorsController::class, 'saveSharedLink']);
    Route::post('/start-chat', [ChatController::class, 'startChat'])->name('start.chat');
    Route::any('/chat/{session}', [ChatController::class, 'viewChat'])->name('chat.view');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');

  

Route::post('/appointments/accept', [AppointmentController::class, 'accept']);
Route::post('/appointments/cancel', [AppointmentController::class, 'cancel']);


   
    
    


});

//patient
Route::get('/signup', [PatientController::class, 'signup'])->name('signup');
Route::post('/patientstore', [PatientController::class, 'patientstore'])->name('patientstore');
Route::get('/patientlogin', [PatientController::class, 'patientlogin'])->name('patientlogin');
Route::middleware('auth')->group(function () {
    Route::get('/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::get('/show/{id}', [PatientController::class, 'show'])->name('patient.show');
    Route::put('/patient/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::get('/patientview', [PatientController::class, 'patientview'])->name('patientview');
    Route::get('/doctorview', [PatientController::class, 'doctorview'])->name('doctorview');
    Route::get('/changepass', [PatientController::class, 'changepass'])->name('changepass');
    Route::post('/update-password', [PatientController::class, 'updatePassword'])->name('user.update-password');
    Route::get('/booking/{id}', [PatientController::class, 'booking'])->name('booking');
    Route::post('/save-booking', [PatientController::class, 'store'])->name('booking.store');
    Route::post('/book-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/check-slot-availability', [AppointmentController::class, 'checkSlotAvailability']);

    Route::get('/checkout/{id}', [PatientController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [PatientController::class, 'sstore'])->name('checkoutstore');
    Route::get('/pappointment', [PatientController::class, 'pappointment'])->name('pappointment');
    Route::post('/profile/update', [PatientController::class, 'updatep'])->name('updateProfile');
    Route::get('/doprofile/{id}', [PatientController::class, 'doprofile'])->name('doprofile');
    Route::get('/bookingsuccess', [PatientController::class, 'bookingsuccess'])->name('bookingsuccess');
    Route::post('/start-chat', [ChatController::class, 'startChat'])->name('start.chat');
    Route::get('/chat/{session}', [ChatController::class, 'viewChat'])->name('chat.view');
    Route::get('/chat/{id}/new-messages', [ChatController::class, 'getNewMessages'])->name('get.new.messages');

});

//medicalhistory

Route::get('/medical-history/create', [MedicalHistoryController::class, 'create'])->name('medical-history.create');
Route::post('/medical-history/store', [MedicalHistoryController::class, 'store'])->name('medical-history.store');
Route::get('/medical-history/pdf/{id}', [MedicalHistoryController::class, 'generatePDF'])->name('medical-history.pdf');

Route::get('/password/reset', function () {
    return view('password_reset'); // Use this if the file is in resources/views
})->name('password.reset.form');


Route::post('/password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');







