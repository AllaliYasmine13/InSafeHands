<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\CertificatMedical;
use Livewire\WithPagination;

class CertificatMedicalComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $certificat_id, $date_certificat, $soussigne, $nom, $prenom, $date_naissance, $lieu_naissance, $Adresse, $Age, $commentaire, $Presente, $signe_par,
    
    $certificat_medical_edit_id, $certificat_medical_delete_id;

    public $view_certificat_medical_certificat_id, $view_certificat_medical_date_certificat, $view_certificat_medical_soussigne, $view_certificat_medical_nom, $view_certificat_medical_prenom, $view_certificat_medical_date_naissance, $view_certificat_medical_lieu_naissance , $view_certificat_medical_Age, $view_certificat_medical_Adresse, $view_certificat_medical_commentaire, $view_certificat_medical_Presente, $view_certificat_medical_signe_par;

    public $searchTerm;
//Input fields on update validation

public function updated($fields)
{
    $this->validateOnly($fields, [
        'certificat_id' => 'required|unique:certificat_medicals,certificat_id,'.$this->certificat_medical_edit_id.'', //Validation with ignoring own data
        'date_certificat' => 'required',       
        'nom' => 'required',
        'prenom' => 'required',
        'Age' => 'required',
        'soussigne' => 'required',
        'date_naissance' => 'required',
        'lieu_naissance' => 'required',
        'Adresse' => 'required',
        'Presente' => 'required',
        'commentaire' => 'required',
        'signe_par' => 'required',
        
    ]);
}
    public function storeCertificatMedicalData(){

        //on form submit validation
        $this->validate([
            'certificat_id' => 'required|unique:certificat_medicals', // certificat_medicals = table name
            'date_certificat' => 'required',       
            'nom' => 'required',
            'prenom' => 'required',
            'Age' => 'required',
            'soussigne' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'Adresse' => 'required',
            'Presente' => 'required',
            'commentaire' => 'required',
            'signe_par' => 'required',          
        ]);

        //Add Student Data
        $certificat_medical =new CertificatMedical();
        $certificat_medical ->certificat_id = $this->certificat_id;
        $certificat_medical ->date_certificat = $this->date_certificat;
        $certificat_medical ->soussigne = $this->soussigne;
        $certificat_medical ->nom = $this->nom;
        $certificat_medical ->prenom = $this->prenom;
        $certificat_medical ->Age = $this->Age;
        $certificat_medical ->date_naissance = $this->date_naissance;
        $certificat_medical ->lieu_naissance = $this->lieu_naissance;
        $certificat_medical ->Adresse = $this->Adresse;
        $certificat_medical ->Presente = $this->Presente;
        $certificat_medical ->commentaire = $this->commentaire;
        $certificat_medical ->signe_par = $this->signe_par;

        $certificat_medical->save();

        session()->flash('message', 'Nouvel Certificat Médical Ajouté avec Succés');

        $this->certificat_id = '';
        $this->date_certificat = '';
        $this->soussigne = '';
        $this->nom = '';
        $this->prenom = '';
        $this->Age = '';
        $this->date_naissance = '';
        $this->lieu_naissance = '';
        $this->Adresse = '';
        $this->Presente = '';
        $this->commentaire = '';
        $this->signe_par = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
{
    $this->certificat_id = '';
    $this->date_certificat = '';
    $this->soussigne = '';
    $this->nom = '';
    $this->prenom = '';
    $this->Age = '';
    $this->date_naissance = '';
    $this->lieu_naissance = '';
    $this->Adresse = '';
    $this->Presente = '';
    $this->commentaire = '';
    $this->signe_par = '';
}

public function close()
{
    $this->resetInputs();
}

//edit certificat medical
    
public function editCertificatMedical($id)
{
    $certificat_medical = CertificatMedical::where('id', $id)->first();

    $this->certificat_medical_edit_id = $certificat_medical->id;

    $this->certificat_id = $certificat_medical->certificat_id;
    $this->date_certificat = $certificat_medical->date_certificat;
    $this->soussigne = $certificat_medical->soussigne;
    $this->nom = $certificat_medical->nom;
    $this->prenom = $certificat_medical->prenom;
    $this->Age = $certificat_medical->Age;
    $this->date_naissance = $certificat_medical->date_naissance;
    $this->lieu_naissance = $certificat_medical->lieu_naissance;
    $this->Adresse = $certificat_medical->Adresse;
    $this->Presente = $certificat_medical->Presente;
    $this->commentaire = $certificat_medical->commentaire;
    $this->signe_par = $certificat_medical->signe_par;
    
    $this->dispatchBrowserEvent('show-edit-certificat_medical-modal');
}

    public function editCertificatMedicalData(){

        //on form submit validation
        $this->validate([
            'certificat_id' => 'required|unique:certificat_medicals,certificat_id,'.$this->certificat_medical_edit_id.'', //Validation with ignoring own data
            'date_certificat' => 'required',       
            'nom' => 'required',
            'prenom' => 'required',
            'Age' => 'required',
            'soussigne' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'Adresse' => 'required',
            'Presente' => 'required',
            'commentaire' => 'required',
            'signe_par' => 'required', 
    ]);

    $certificat_medical = CertificatMedical::where('id', $this->certificat_medical_edit_id)->first();
    
        $certificat_medical ->certificat_id = $this->certificat_id;
        $certificat_medical ->date_certificat = $this->date_certificat;
        $certificat_medical ->soussigne = $this->soussigne;
        $certificat_medical ->nom = $this->nom;
        $certificat_medical ->prenom = $this->prenom;
        $certificat_medical ->Age = $this->Age;
        $certificat_medical ->date_naissance = $this->date_naissance;
        $certificat_medical ->lieu_naissance = $this->lieu_naissance;
        $certificat_medical ->Adresse = $this->Adresse;
        $certificat_medical ->Presente = $this->Presente;
        $certificat_medical ->commentaire = $this->commentaire;
        $certificat_medical ->signe_par = $this->signe_par;

    $certificat_medical->save();


    session()->flash('message', 'Certificat Medical Mise à Jour Avec Succés');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit certificat

    //Delete certificat

public function deleteConfirmation($id)
{
    $this->certificat_medical_delete_id = $id; //certificat id

    $this->dispatchBrowserEvent('show-delete-confirmation-modal');
}


public function deleteCertificatMedicalData()
{
    $certificat_medical = CertificatMedical::where('id', $this->certificat_medical_delete_id)->first();
    $certificat_medical->delete();


    session()->flash('message', 'Certificat Médical Supprimé avec Succés!');


    $this->dispatchBrowserEvent('close-modal');


    $this->certificat_medical_delete_id = '';
}

public function cancel()
{
    $this->certificat_medical_delete_id = '';
}
    //end delete certificat_medical

    // view certificat_medical

    public function viewCertificatMedicalDetails($id)
    {
        $certificat_medical = CertificatMedical::where('id', $id)->first();
    
        $this->view_certificat_medical_certificat_id = $certificat_medical->certificat_id;
        $this->view_certificat_medical_date_certificat = $certificat_medical->date_certificat;
        $this->view_certificat_medical_soussigne = $certificat_medical->soussigne;
        $this->view_certificat_medical_nom = $certificat_medical->nom;
        $this->view_certificat_medical_prenom = $certificat_medical->prenom;
        $this->view_certificat_medical_Age = $certificat_medical->Age;
        $this->view_certificat_medical_date_naissance = $certificat_medical->date_naissance;
        $this->view_certificat_medical_lieu_naissance = $certificat_medical->lieu_naissance;
        $this->view_certificat_medical_Adresse = $certificat_medical->Adresse;
        $this->view_certificat_medical_Presente = $certificat_medical->Presente;
        $this->view_certificat_medical_commentaire = $certificat_medical->commentaire;
        $this->view_certificat_medical_signe_par = $certificat_medical->signe_par;
    
        $this->dispatchBrowserEvent('show-view-certificat_medical-modal');
        
    }
    
    
    public function closeViewCertificatMedicalModal()
    {
        $this->view_certificat_medical_certificat_id ='';
        $this->view_certificat_medical_date_certificat ='';
        $this->view_certificat_medical_soussigne ='';
        $this->view_certificat_medical_nom = '';
        $this->view_certificat_medical_prenom ='';
        $this->view_certificat_medical_Age ='';
        $this->view_certificat_medical_date_naissance ='';
        $this->view_certificat_medical_lieu_naissance = '';
        $this->view_certificat_medical_Adresse = '';
        $this->view_certificat_medical_Presente = '';
        $this->view_certificat_medical_commentaire = '';
        $this->view_certificat_medical_signe_par = '';

        $this->certificat_medical_edit_id = '';
    }
    // end view certificat_medical_

    public function render()
    { 
        // get All certificat medicals
        $certificat_medicals= CertificatMedical::where('certificat_id','like','%'.$this->searchTerm.'%')
        ->orWhere('nom','like','%'.$this->searchTerm.'%')
        ->orWhere('prenom','like','%'.$this->searchTerm.'%')
        ->get();
        
        return view('livewire.certificat-medical-component',[

            'certificat_medicals'=>$certificat_medicals,
            'certificat_medicals'=>CertificatMedical::paginate(2)
        ])->layout('livewire.layouts.base4')
          ->extends("layouts.master")
          ->section("contenu");
    }
}
