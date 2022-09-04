<?php

use App\Http\Livewire\UtilisateursComponent;
use App\Http\Livewire\UtilisateurComponent;

use App\Http\Livewire\RdvsComponent;
use App\Http\Livewire\PatientsComponent;
use App\Http\Livewire\DossierMedicalComponent;
use App\Http\Livewire\FicheNavetteComponent;
use App\Http\Livewire\OrdonnanceComponent;

use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\clientComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes php -S localhost:8000 -t public/
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

|<?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?>
<?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?>
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/email', [App\Http\Controllers\EmailController::class, 'create']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// role permissions

/* Admin permission */
Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/private', function(){

        return 'Hello Admin!';
    });
});

// livewire routes
Route::get('utilisateurs',UtilisateursComponent::class);
Route::get('utilisateur',UtilisateurComponent::class);
Route::get('rdvs',RdvsComponent::class);
Route::get('patients',PatientsComponent::class);
Route::get('dossier_medicals',DossierMedicalComponent::class);
Route::get('fiche_navettes',FicheNavetteComponent::class);
Route::get('ordonnance',OrdonnanceComponent::class);
// end livewire routes

/*-------------------- Admin Routes ----------------------*/
Route::prefix('admin')->group(function(){
Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
Route::get('/certificat_medical',[AdminController::class, 'Certificat_Medical'])->name('admin.dashboard.certificat_medical');
Route::get('/utilisateurs',[AdminController::class, 'Utilisateurs'])->name('admin.dashboard.utilisateurs');
Route::get('/contact',[AdminController::class, 'Contact'])->name('admin.dashboard.contact');
Route::get('/statistiques',[AdminController::class, 'Statistique'])->name('admin.dashboard.statistiques');
Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
});
/*-------------------- Secretaire Routes ----------------------*/
Route::prefix('secretaire')->group(function(){
Route::get('/login',[SecretaireController::class, 'Index'])->name('secretaire_login_from'); 
Route::post('/login/owner',[SecretaireController::class, 'Login'])->name('secretaire.login');  
Route::get('/dashboard',[SecretaireController::class, 'Dashboard'])->name('secretaire.dashboard')->middleware('secretaire');   
Route::get('/gestion_des_rdv',[SecretaireController::class, 'Gestion_RDV'])->name('secretaire.dashboard.gestion_des_rdv');
Route::get('/logout',[SecretaireController::class, 'SecretaireLogout'])->name('secretaire.logout')->middleware('secretaire');
});  
/*-------------------- Medecin Routes ----------------------*/
Route::prefix('medecin')->group(function(){
Route::get('/login',[MedecinController::class, 'Index'])->name('medecin_login_from');   
Route::post('/login/owner',[MedecinController::class, 'Login'])->name('medecin.login');    
Route::get('/dashboard',[MedecinController::class, 'Dashboard'])->name('medecin.dashboard')->middleware('medecin');
Route::get('/logout',[MedecinController::class, 'MedecinLogout'])->name('medecin.logout')->middleware('medecin');
});
/*-------------------- Patient Routes ----------------------*/
Route::prefix('patient')->group(function(){
Route::get('/login',[PatientController::class, 'Index'])->name('patient_login_from');   
Route::post('/login/owner',[PatientController::class, 'Login'])->name('patient.login');   
Route::get('/dashboard',[PatientController::class, 'Dashboard'])->name('patient.dashboard')->middleware('patient');
Route::get('/consultation_des_rdv',[PatientController::class, 'Consultation_RDV'])->name('patient.dashboard.consultation_des_rdv');
Route::get('/consultation_certificat',[PatientController::class, 'Consultation_certificat'])->name('patient.dashboard.consultation_certificat');
Route::get('/logout',[PatientController::class, 'PatientLogout'])->name('patient.logout')->middleware('patient');
});
/*--------------------End Patient Routes--------------------*/
require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'calendar'])->name('calendar');

/* Edit Profile route*/
Route::get('/profile/edit_profile', [App\Http\Controllers\UserController::class, 'EditProfile'])->name('edit_profile');
Route::get('/profile/change_password', [App\Http\Controllers\UserController::class, 'EditPassword'])->name('edit_password');
/* admin permissions */ 

Route::group([
    'middleware' => ['auth','auth.Admin'],
    'as' => 'Admin.'
], function(){
         
Route::group([
    'prefix' => 'gestions',
    'as' => 'gestions.'
], function(){
        Route::get('/utilisateurs', Utilisateurs::class)->name('users.index');       
     }); 
     
 });

Route::group([
    "middleware" => ["auth", "auth.Medecin"],
    'as' => 'Medecin.'
], function(){
    // Route::get("/patients_agees", clientComp::class)->name("patients_agees.index");
    Route::get("/patients_agees", PatientsComponent::class)->name("patients_agees");
});

Route::group([    
    'middleware' => ['auth','auth.Secretaire'],
    'as' => 'Secretaire.'
], function(){
        Route::get('/gestion_des_rdvs', RdvsComponent::class)->name('gestion_des_rdvs');
    
});



// Route::get('/gestions/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])->name('utilisateurs')->middleware("auth.admin");

// background: rgba(21, 40, 60, .8);