<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\models\PatientsAgees;
use Livewire\WithPagination;

class PatientsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $patient_id, $nom_prenom, $date, $poid, $taille, $maladie_chronique,$adresse, $telephone, $email, $medecin_traitant, $adressee_par, $assurance_maladie, $nom_contact_urgence, $tel_contact_urgence , $patient_edit_id, $patient_delete_id;
    public $view_patient_id, $view_patient_nom_prenom, $view_patient_date, $view_patient_poid, $view_patient_taille, $view_patient_maladie_chronique,$view_patient_adresse, $view_patient_telephone, $view_patient_email, $view_patient_medecin_traitant, $view_patient_adressee_par, $view_patient_assurance_maladie, $view_patient_nom_contact_urgence, $view_patient_tel_contact_urgence;
    public $searchTerm;
    //Input fields on update validation


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'patient_id' => 'required|unique:patients_agees,patient_id,'.$this->patient_edit_id.'', //Validation with ignoring own data
            'nom_prenom' => 'required',
            'date' => 'required',
            'poid' => 'required',
            'taille' => 'required',
            'maladie_chronique' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'medecin_traitant' => 'required',
            'adressee_par' => 'required',
            'assurance_maladie' => 'required',
            'nom_contact_urgence' => 'required',
            'tel_contact_urgence' => 'required',
            
        ]);
    }

    public function storePatientData(){

        //on form submit validation
        $this->validate([
            'patient_id' => 'required|unique:patients_agees', // patients_agees = table name
            'nom_prenom' => 'required',
            'date' => 'required',
            'poid' => 'required',
            'taille' => 'required',
            'maladie_chronique' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'medecin_traitant' => 'required',
            'adressee_par' => 'required',
            'assurance_maladie' => 'required',
            'nom_contact_urgence' => 'required',
            'tel_contact_urgence' => 'required',
        ]);

                //Add Student Data
                $patient =new PatientsAgees();
                $patient ->patient_id = $this->patient_id;
                $patient ->nom_prenom = $this->nom_prenom;
                $patient ->date = $this->date;
                $patient ->poid = $this->poid;
                $patient ->taille = $this->taille;
                $patient ->maladie_chronique = $this->maladie_chronique;
                $patient ->adresse = $this->adresse;
                $patient ->telephone = $this->telephone;
                $patient ->email = $this->email;
                $patient ->medecin_traitant = $this->medecin_traitant;
                $patient ->adressee_par = $this->adressee_par;
                $patient ->assurance_maladie = $this->assurance_maladie;
                $patient ->nom_contact_urgence = $this->nom_contact_urgence;
                $patient ->tel_contact_urgence = $this->tel_contact_urgence;
        
                $patient->save();
        
                session()->flash('message', 'New Patient Agé has been added successfully');
        
                $this->patient_id = '';
                $this->nom_prenom = '';
                $this->date = '';
                $this->poid= '';
                $this->taille = '';
                $this->maladie_chronique = '';
                $this->adresse = '';
                $this->telephone = '';
                $this->email= '';
                $this->medecin_traitant = '';
                $this->adressee_par = '';
                $this->assurance_maladie = '';
                $this->nom_contact_urgence = '';
                $this->tel_contact_urgence= '';
                
                //For hide model after add student success 
                $this->dispatchBrowserEvent('close-modal');
            }
        
            public function resetInputs()
            {
                $this->patient_id = '';
                $this->nom_prenom = '';
                $this->date = '';
                $this->poid= '';
                $this->taille = '';
                $this->maladie_chronique = '';
                $this->adresse = '';
                $this->telephone = '';
                $this->email= '';
                $this->medecin_traitant = '';
                $this->adressee_par = '';
                $this->assurance_maladie = '';
                $this->nom_contact_urgence = '';
                $this->tel_contact_urgence= '';
            }
            
            
            public function close()
            {
                $this->resetInputs();
            }

            //edit utilisateur
    
public function editPatient($id)
{
    $patient = PatientsAgees::where('id', $id)->first();


    $this->patient_edit_id = $patient->id;
    $this->patient_id = $patient->patient_id;
    $this->nom_prenom = $patient->nom_prenom;
    $this->date = $patient->date;
    $this->poid = $patient->poid;
    $this->taille = $patient->taille;
    $this->maladie_chronique = $patient->maladie_chronique;
    $this->adresse = $patient->adresse;
    $this->telephone = $patient->telephone;
    $this->email = $patient->email;
    $this->medecin_traitant = $patient->medecin_traitant;
    $this->adressee_par = $patient->adressee_par;
    $this->assurance_maladie = $patient->assurance_maladie;
    $this->nom_contact_urgence = $patient->nom_contact_urgence;
    $this->tel_contact_urgence = $patient->tel_contact_urgence;
    
    $this->dispatchBrowserEvent('show-edit-patient-modal');
}

public function editPatientData(){

    //on form submit validation
    $this->validate([
    'patient_id' => 'required|unique:patients_agees,patient_id,'.$this->patient_edit_id.'', //Validation with ignoring own data
    'nom_prenom' => 'required',
    'date' => 'required',
    'poid' => 'required',
    'taille' => 'required',
    'maladie_chronique' => 'required',
    'adresse' => 'required',
    'telephone' => 'required',
    'email' => 'required|email',
    'medecin_traitant' => 'required',
    'adressee_par' => 'required',
    'assurance_maladie' => 'required',
    'nom_contact_urgence' => 'required',
    'tel_contact_urgence' => 'required',
]);

$patient = PatientsAgees::where('id', $this->patient_edit_id)->first();
$patient->patient_id = $this->patient_id;
$patient ->nom_prenom = $this->nom_prenom;
$patient ->date = $this->date;
$patient ->poid = $this->poid;
$patient ->taille = $this->taille;
$patient ->maladie_chronique = $this->maladie_chronique;
$patient ->adresse = $this->adresse;
$patient ->telephone = $this->telephone;
$patient ->email = $this->email;
$patient ->medecin_traitant = $this->medecin_traitant;
$patient ->adressee_par = $this->adressee_par;
$patient ->assurance_maladie = $this->assurance_maladie;
$patient ->nom_contact_urgence = $this->nom_contact_urgence;
$patient ->tel_contact_urgence = $this->tel_contact_urgence;

$patient->save();


session()->flash('message', 'Patient Agé has been updated successfully');


//For hide modal after add student success
$this->dispatchBrowserEvent('close-modal');


}

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

    public function deleteConfirmation($id)
    {
        $this->patient_delete_id = $id; //patient id
    
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deletePatientData()
    {
    $patient = PatientsAgees::where('id', $this->patient_delete_id)->first();
    $patient->delete();


    session()->flash('message', 'Patient Agé has been deleted successfully');


    $this->dispatchBrowserEvent('close-modal');


    $this->patient_delete_id = '';
}

public function cancel()
{
    $this->patient_delete_id = '';
}


    //end delete utilisateur

    // view utilisateur
    public function viewPatientDetails($id)
    {
        $patient = PatientsAgees::where('id', $id)->first();
    
        $this->view_patient_id = $patient->patient_id;
        $this->view_patient_nom_prenom = $patient->nom_prenom;
        $this->view_patient_date = $patient->date;
        $this->view_patient_poid = $patient->poid;
        $this->view_patient_taille = $patient->taille;
        $this->view_patient_maladie_chronique = $patient->maladie_chronique;
        $this->view_patient_adresse = $patient->adresse;
        $this->view_patient_telephone = $patient->telephone;
        $this->view_patient_email = $patient->email;
        $this->view_patient_medecin_traitant = $patient->medecin_traitant;
        $this->view_patient_adressee_par = $patient->adressee_par;
        $this->view_patient_assurance_maladie = $patient->assurance_maladie;
        $this->view_patient_nom_contact_urgence = $patient->nom_contact_urgence;
        $this->view_patient_tel_contact_urgence = $patient->tel_contact_urgence;
        
    
        $this->dispatchBrowserEvent('show-view-patient-modal');
    }

    public function closeViewPatientModal()
    {
        $this->view_patient_patient_id = '';
        $this->view_patient_nom_prenom = '';
        $this->view_patient_date = '';
        $this->view_patient_poid= '';
        $this->view_patient_taille = '';
        $this->view_patient_maladie_chronique = '';
        $this->view_patient_adresse = '';
        $this->view_patient_telephone = '';
        $this->view_patient_email= '';
        $this->view_patient_medecin_traitant = '';
        $this->view_patient_adressee_par = '';
        $this->view_patient_assurance_maladie = '';
        $this->view_patient_nom_contact_urgence = '';
        $this->view_patient_tel_contact_urgence= '';
    }

    // end view utilisateur

    public function render()
    {
        // get All Patients agées
        $patients= PatientsAgees::where('nom_prenom','like','%'.$this->searchTerm.'%')->orWhere('patient_id','like','%'.$this->searchTerm.'%')->orWhere('date','like','%'.$this->searchTerm.'%')->get();

        return view('livewire.patients-component',[
            'patients'=>$patients,
            'patients'=>PatientsAgees::paginate(4)

            ])->layout('livewire.layouts.base1')
              ->extends("layouts.master")
              ->section("contenu");
    }
}
