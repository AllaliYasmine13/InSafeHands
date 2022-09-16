<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\DossierMedical;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class DossierMedicalComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = "bootstrap";
    
    public $dossier_medical_id, $dossier_id, $nom, $prenom, $photo, $service, $medecin_traitant, $date_naissance, $lieu_naissance, $domicille, $profession, $medecin_chef, $salle, $num_lit, $date_entree,$mode_entree, $date_sortie, $mode_sortie, $diagnostic, $traitement, $observations, $explorations, $etat_sortie, $indications, $signature_chef_service, 
    
    $dossier_medical_edit_id, $dossier_medical_delete_id;
    
    public $view_dossier_medical_id, $view_dossier_medical_nom, $view_dossier_medical_prenom, $view_dossier_medical_date_naissance, $view_dossier_medical_created_at ;

    public $searchTerm;

//Input fields on update validation
public function updated($fields)
{
    $this->validateOnly($fields, [
        'dossier_id' => 'required|unique:dossier_medicals,dossier_id,'.$this->dossier_medical_edit_id.'', //Validation with ignoring own data
        'nom' => 'required',
        'prenom' => 'required',
        'photo' => 'image|max:1024', // 1MB Max
        'service' => 'required',

        'date_naissance' => 'required',
        'lieu_naissance' => 'required',
        'domicille' => 'required',
        'profession' => 'required',

        'medecin_chef' => 'required',
        'salle' => 'required',
        'num_lit' => 'required',

        'date_entree' => 'required',
        'mode_entree' => 'required',
        'date_sortie' => 'required',
        'mode_sortie' => 'required',

        'diagnostic' => 'required',
        'traitement' => 'required',
        'observations' => 'required',

        'explorations' => 'required',
        'etat_sortie' => 'required',
        'observations' => 'required',

        'medecin_traitant' => 'required',
        'indications' => 'required',
        'signature_chef_service' => 'required',
        
    ]);
}
    public function storeDossierMedicalData(){

        //on form submit validation
        $this->validate([
            'dossier_id' => 'required|unique:dossier_medicals', // dossier_medicals = table name
            'nom' => 'required',
            'prenom' => 'required',
            'photo' => 'image|max:1024',
            'service' => 'required',
    
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'domicille' => 'required',
            'profession' => 'required',
    
            'medecin_chef' => 'required',
            'salle' => 'required',
            'num_lit' => 'required',
    
            'date_entree' => 'required',
            'mode_entree' => 'required',
            'date_sortie' => 'required',
            'mode_sortie' => 'required',
    
            'diagnostic' => 'required',
            'traitement' => 'required',
            'observations' => 'required',
    
            'explorations' => 'required',
            'etat_sortie' => 'required',
                
            'medecin_traitant' => 'required',
            'indications' => 'required',
            'signature_chef_service' => 'required',
            
        ]);

        //Add Student Data
        $dossier_medical =new DossierMedical();
        $dossier_medical ->dossier_id = $this->dossier_id;
        $dossier_medical ->nom = $this->nom;
        $dossier_medical ->prenom = $this->prenom;
        $dossier_medical ->photo = $this->$photo->hashName;
        $dossier_medical ->service = $this->service;

        $dossier_medical ->date_naissance = $this->date_naissance;
        $dossier_medical ->lieu_naissance = $this->lieu_naissance;
        $dossier_medical ->domicille = $this->domicille;
        $dossier_medical ->profession = $this->profession;

        $dossier_medical ->medecin_chef = $this->medecin_chef;
        $dossier_medical ->salle = $this->salle;
        $dossier_medical ->num_lit = $this->num_lit;

        $dossier_medical ->date_entree = $this->date_entree;
        $dossier_medical ->mode_entree = $this->mode_entree;
        $dossier_medical ->date_sortie = $this->date_sortie;
        $dossier_medical ->mode_sortie = $this->mode_sortie;

        $dossier_medical ->diagnostic= $this->diagnostic;
        $dossier_medical ->traitement = $this->traitement;
        $dossier_medical ->observations = $this->observations;
        $dossier_medical ->explorations = $this->explorations;

        $dossier_medical ->medecin_traitant = $this->medecin_traitant;
        $dossier_medical ->etat_sortie = $this->etat_sortie;
        $dossier_medical ->indications = $this->indications;
        $dossier_medical ->signature_chef_service = $this->signature_chef_service;

        $dossier_medical->save();

        session()->flash('message', 'Nouveau Dossier Medical Ajouter avec succés');

        $this->dossier_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->photo = '';
        $this->service = '';

        $this->date_naissance = '';
        $this->lieu_naissance = '';
        $this->domicille = '';
        $this->profession = '';

        $this->medecin_chef = '';
        $this->salle = '';
        $this->num_lit = '';

        $this->date_entree = '';
        $this->mode_entree = '';
        $this->date_sortie = '';
        $this->mode_sortie = '';

        $this->diagnostique = '';
        $this->traitement = '';
        $this->observations = '';
        $this->explorations = '';

        $this->medecin_traitant = '';
        $this->etat_sortie= '';
        $this->indications = '';
        $this->signature_chef_service = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');

        if(!empty($this->photo)) {
            $this->photo->store('public/photos');
         }
    }

    public function resetInputs()
{
        $this->dossier_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->photo = '';
        $this->service = '';

        $this->date_naissance = '';
        $this->lieu_naissance = '';
        $this->domicille = '';
        $this->profession = '';

        $this->medecin_chef = '';
        $this->salle = '';
        $this->num_lit = '';

        $this->date_entree = '';
        $this->mode_entree = '';
        $this->date_sortie = '';
        $this->mode_sortie = '';

        $this->diagnostique = '';
        $this->traitement = '';
        $this->observations = '';
        $this->explorations = '';

        $this->medecin_traitant = '';
        $this->etat_sortie= '';
        $this->indications = '';
        $this->signature_chef_service = '';
}


public function close()
{
    $this->resetInputs();
}

//edit utilisateur
    
public function editDossierMedical($id)
{
    $dossier_medical = DossierMedical::where('id', $id)->first();

            $this->dossier_medical_edit_id = $dossier_medical->id;
            $this->dossier_id = $dossier_medical->dossier_id; 
            $this->nom = $dossier_medical->nom;
            $this->prenom = $dossier_medical->prenom;
            $this->photo = $dossier_medical->photo;
            $this->service = $dossier_medical->service;

            $this->date_naissance = $dossier_medical->date_naissance;
            $this->lieu_naissance = $dossier_medical->lieu_naissance;
            $this->domicille = $dossier_medical->domicille;
            $this->profession = $dossier_medical->profession;

            $this->medecin_chef = $dossier_medical->medecin_chef;
            $this->salle = $dossier_medical->salle;
            $this->num_lit = $dossier_medical->num_lit;

            $this->date_entree = $dossier_medical->date_entree;
            $this->mode_entree = $dossier_medical->mode_entree;
            $this->date_sortie = $dossier_medical->date_sortie;
            $this->mode_sortie = $dossier_medical->mode_sortie;

            $this->diagnostique = $dossier_medical->diagnostique;
            $this->traitement = $dossier_medical->traitement;
            $this->observations = $dossier_medical->observations;
            $this->explorations = $dossier_medical->explorations;

            $this->edecin_traitant = $dossier_medical->medecin_traitant;
            $this->etat_sortie= $dossier_medical->etat_sortie;
            $this->indications = $dossier_medical->indications;
            $this->signature_chef_service = $dossier_medical->signature_chef_service;
    
    $this->dispatchBrowserEvent('show-edit-dossier_medical-modal');
}

    public function editDossierMedicalData(){

        //on form submit validation
        $this->validate([
            'dossier_id' => 'required|unique:dossier_medicals,dossier_id,'.$this->dossier_medical_edit_id.'', //Validation with ignoring own data
            'nom' => 'required',
            'prenom' => 'required',
            'photo' => 'image|max:1024',
            'service' => 'required',
    
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'domicile' => 'required',
            'profession' => 'required',
    
            'medecin_chef' => 'required',
            'salle' => 'required',
            'num_lit' => 'required',
    
            'date_entree' => 'required',
            'mode_entree' => 'required',
            'date_sortie' => 'required',
            'mode_sortie' => 'required',
    
            'diagnostic' => 'required',
            'traitement' => 'required',
            'observations' => 'required',
    
            'explorations' => 'required',
            'etat_sortie' => 'required',
                
            'medecin_traitant' => 'required',
            'indications' => 'required',
            'signature_chef_service' => 'required',
    ]);

        $dossier_medical = DossierMedical::where('id', $this->dossier_medical_edit_id)->first();

        $dossier_medical ->dossier_id = $this->dossier_id;
        $dossier_medical ->nom = $this->nom;
        $dossier_medical ->prenom = $this->prenom;
        $dossier_medical ->photo = $this->photo;
        $dossier_medical ->service = $this->service;

        $dossier_medical ->date_naissance = $this->date_naissance;
        $dossier_medical ->lieu_naissance = $this->lieu_naissance;
        $dossier_medical ->domicille = $this->domicille;
        $dossier_medical ->profession = $this->profession;

        $dossier_medical ->medecin_chef = $this->medecin_chef;
        $dossier_medical ->salle = $this->salle;
        $dossier_medical ->num_lit = $this->num_lit;

        $dossier_medical ->date_entree = $this->date_entree;
        $dossier_medical ->mode_entree = $this->mode_entree;
        $dossier_medical ->date_sortie = $this->date_sortie;
        $dossier_medical ->mode_sortie = $this->mode_sortie;

        $dossier_medical ->diagnostic= $this->diagnostic;
        $dossier_medical ->traitement = $this->traitement;
        $dossier_medical ->observations = $this->observations;
        $dossier_medical ->explorations = $this->explorations;

        $dossier_medical ->medecin_traitant = $this->medecin_traitant;
        $dossier_medical ->etat_sortie = $this->etat_sortie;
        $dossier_medical ->indications = $this->indications;
        $dossier_medical ->signature_chef_service = $this->signature_chef_service;

    $dossier_medical->save();


    session()->flash('message', 'Dossier Médical Mise à jours avec succés');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

    public function deleteConfirmation($id)
    {
        $this->dossier_medical_delete_id = $id; //dossier medical id
    
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }
    
    
    public function deleteDossierMedicalData()
    {
        $dossier_medical = DossierMedical::where('id', $this->dossier_medical_delete_id)->first();
        $dossier_medical->delete();
    
    
        session()->flash('message', 'Dossier Médical Supprimé avec succés');
    
    
        $this->dispatchBrowserEvent('close-modal');
    
    
        $this->dossier_medical_delete_id = '';
    }
    
    public function cancel()
    {
        $this->dossier_medical_delete_id = '';
    }
    
        //end delete utilisateur  
        
        // view utilisateur

        public function viewDossierMedicalDetails($id)
        {
            $dossier_medical = DossierMedical::where('id', $id)->first();
                
            $this->view_dossier_medical_dossier_id = $dossier_medical->dossier_id;
            $this->view_dossier_medical_nom = $dossier_medical->nom;
            $this->view_dossier_medical_prenom = $dossier_medical->prenom;
            $this->view_dossier_medical_photo = $dossier_medical->photo;
            $this->view_dossier_medical_service = $dossier_medical->service;

            $this->view_dossier_medical_date_naissance = $dossier_medical->date_naissance;
            $this->view_dossier_medical_lieu_naissance = $dossier_medical->lieu_naissance;
            $this->view_dossier_medical_domicille = $dossier_medical->domicille;
            $this->view_dossier_medical_profession = $dossier_medical->profession;

            $this->view_dossier_medical_medecin_chef = $dossier_medical->medecin_chef;
            $this->view_dossier_medical_salle = $dossier_medical->salle;
            $this->view_dossier_medical_num_lit = $dossier_medical->num_lit;

            $this->view_dossier_medical_date_entree = $dossier_medical->date_entree;
            $this->view_dossier_medical_mode_entree = $dossier_medical->mode_entree;
            $this->view_dossier_medical_date_sortie = $dossier_medical->date_sortie;
            $this->view_dossier_medical_mode_sortie = $dossier_medical->mode_sortie;

            $this->view_dossier_medical_diagnostique = $dossier_medical->diagnostique;
            $this->view_dossier_medical_traitement = $dossier_medical->traitement;
            $this->view_dossier_medical_observations = $dossier_medical->observations;
            $this->view_dossier_medical_explorations = $dossier_medical->explorations;

            $this->view_dossier_medical_medecin_traitant = $dossier_medical->medecin_traitant;
            $this->view_dossier_medical_etat_sortie= $dossier_medical->etat_sortie;
            $this->view_dossier_medical_indications = $dossier_medical->indications;
            $this->view_dossier_medical_signature_chef_service = $dossier_medical->signature_chef_service;
        
            $this->dispatchBrowserEvent('show-view-dossier-modal');
        }
        
        
        public function closeViewDossierMedicalModal()
        {
            $this->view_dossier_medical_dossier_id = '';
            $this->view_dossier_medical_nom = '';
            $this->view_dossier_medical_prenom = '';
            $this->view_dossier_medical_photo = '';
            $this->view_dossier_medical_service = '';

            $this->view_dossier_medical_date_naissance = '';
            $this->view_dossier_medical_lieu_naissance = '';
            $this->view_dossier_medical_domicille = '';
            $this->view_dossier_medical_profession = '';

            $this->view_dossier_medical_medecin_chef = '';
            $this->view_dossier_medical_salle = '';
            $this->view_dossier_medical_num_lit = '';

            $this->view_dossier_medical_date_entree = '';
            $this->view_dossier_medical_mode_entree = '';
            $this->view_dossier_medical_date_sortie = '';
            $this->view_dossier_medical_mode_sortie = '';

            $this->view_dossier_medical_diagnostique = '';
            $this->view_dossier_medical_traitement = '';
            $this->view_dossier_medical_observations = '';
            $this->view_dossier_medical_explorations = '';

            $this->view_dossier_medical_medecin_traitant = '';
            $this->view_dossier_medical_etat_sortie= '';
            $this->view_dossier_medical_indications = '';
            $this->view_dossier_medical_signature_chef_service = '';
        }
           
        // end view utilisateur   
    
    public function render()

    {   // get All Dossier Medicals
        $dossier_medicals= DossierMedical::where('nom','like','%'.$this->searchTerm.'%')->orWhere('prenom','like','%'.$this->searchTerm.'%')
        ->orWhere('dossier_id','like','%'.$this->searchTerm.'%')
        ->get();

         return view('livewire.dossier-medical-component',[
            'dossier_medicals'=>$dossier_medicals,
            'dossier_medicals'=>DossierMedical::paginate(2)
            
            ])->layout('livewire.layouts.base3')
              ->extends("layouts.master")
              ->section("contenu");

    }
}
