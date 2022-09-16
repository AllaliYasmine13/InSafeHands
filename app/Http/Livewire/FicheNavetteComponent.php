<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\FicheNavette;
use Livewire\WithPagination;

class FicheNavetteComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $fiche_navette_id, $admission_id, $service, $num_lit, $salle, $nom, $prenom, $age, $date_naissance, $lieu_naissance, $securite_social, $num_assurance, $num_carte, $actes_medicaux_chirurgicaux, $bilan_biologiques_radiologique, $medicaments,

    $date_entree, $heure_entree, $mode_entree, $date_sortie, $heure_sortie,
    
    $fiche_navette_edit_id, $fiche_navette_delete_id;

    public $view_fiche_navette_fiche_navette_id, $view_fiche_navette_admission_id, $view_fiche_navette_service, $view_fiche_navette_num_lit, $view_fiche_navette_salle, $view_fiche_navette_nom, $view_fiche_navette_prenom, $view_fiche_navette_age,
   
    $view_fiche_navette_date_naissance, $view_fiche_navette_lieu_naissance, $view_fiche_navette_securite_social, $view_fiche_navette_num_assurance, $view_fiche_navette_num_carte, 
    
    $view_fiche_navette_actes_medicaux_chirurgicaux, $view_fiche_navette_bilan_biologiques_radiologique, $view_fiche_navette_medicaments,

    $view_fiche_navette_date_entree, $view_fiche_navette_heure_entree, $view_fiche_navette_mode_entree, $view_fiche_navette_date_sortie, $view_fiche_navette_heure_sortie ;

    public $searchTerm;
//Input fields on update validation

public function updated($fields)
{
    $this->validateOnly($fields, [
        'fiche_navette_id' => 'required|unique:fiche_navettes,fiche_navette_id,'.$this->fiche_navette_edit_id.'', //Validation with ignoring own data
        'fiche_navette_id' => 'required',
        'admission_id' => 'required',
        'nom' => 'required',
        'prenom' => 'required',
        'age' => 'required',
        'date_naissance' => 'required',
        'lieu_naissance' => 'required',
        'service' => 'required',
        'salle' => 'required',
        'num_lit' => 'required',
        'securite_social' => 'required',
        'num_assurance' => 'required',
        'num_carte' => 'required',
        'actes_medicaux_chirurgicaux' => 'required',
        'bilan_biologiques_radiologique' => 'required',
        'medicaments' => 'required',
        'date_entree' => 'required',
        'heure_entree' => 'required',
        'mode_entree' => 'required',
        'date_sortie' => 'required',
        'heure_sortie' => 'required',
        
    ]);
}
    public function storeFicheNavetteData(){

        //on form submit validation
        $this->validate([
            'fiche_navette_id' => 'required|unique:fiche_navettes', // fiche_navettes = table name
            'admission_id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'service' => 'required',
            'salle' => 'required',
            'num_lit' => 'required',
            'securite_social' => 'required',
            'num_assurance' => 'required',
            'num_carte' => 'required',
            'actes_medicaux_chirurgicaux' => 'required',
            'bilan_biologiques_radiologique' => 'required',
            'medicaments' => 'required',
            'date_entree' => 'required',
            'heure_entree' => 'required',
            'mode_entree' => 'required',
            'date_sortie' => 'required',
            'heure_sortie' => 'required',          
        ]);

        //Add Student Data
        $fiche_navette =new FicheNavette();
        $fiche_navette ->fiche_navette_id = $this->fiche_navette_id;
        $fiche_navette ->admission_id = $this->admission_id;
        $fiche_navette ->nom = $this->nom;
        $fiche_navette ->prenom = $this->prenom;
        $fiche_navette ->age = $this->age;
        $fiche_navette ->date_naissance = $this->date_naissance;
        $fiche_navette ->lieu_naissance = $this->lieu_naissance;
        $fiche_navette ->service = $this->service;
        $fiche_navette ->salle = $this->salle;
        $fiche_navette ->num_lit = $this->num_lit;
        $fiche_navette ->securite_social = $this->securite_social;
        $fiche_navette ->num_assurance = $this->num_assurance;
        $fiche_navette ->num_carte = $this->num_carte;
        
        $fiche_navette ->actes_medicaux_chirurgicaux = 
        $this->actes_medicaux_chirurgicaux;
        
        $fiche_navette ->bilan_biologiques_radiologique = $this->bilan_biologiques_radiologique;
        $fiche_navette ->medicaments = $this->medicaments;
        $fiche_navette ->date_entree = $this->date_entree;
        $fiche_navette ->heure_entree = $this->heure_entree;
        $fiche_navette ->mode_entree = $this->mode_entree;
        $fiche_navette ->date_sortie = $this->date_sortie;
        $fiche_navette ->heure_sortie = $this->heure_sortie;

        $fiche_navette->save();

        session()->flash('message', 'Nouvelle Fiche Navette Ajouté avec Succés');

        $this->fiche_navette_id = '';
        $this->admission_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->age = '';
        $this->date_naissance= '';
        $this->lieu_naissance = '';
        $this->service = '';
        $this->salle = '';
        $this->num_lit= '';
        $this->securite_social = '';
        $this->num_assurance = '';
        $this->num_carte = '';
        $this->actes_medicaux_chirurgicaux = '';
        $this->bilan_biologiques_radiologique = '';
        $this->medicaments = '';
        $this->date_entree = '';
        $this->heure_entree = '';
        $this->mode_entree = '';
        $this->date_sortie = '';
        $this->heure_sortie = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
{
    $this->fiche_navette_id = '';
    $this->admission_id = '';
    $this->nom = '';
    $this->prenom = '';
    $this->age = '';
    $this->date_naissance= '';
    $this->lieu_naissance = '';
    $this->service = '';
    $this->salle = '';
    $this->num_lit= '';
    $this->securite_social = '';
    $this->num_assurance = '';
    $this->num_carte = '';
    $this->actes_medicaux_chirurgicaux = '';
    $this->bilan_biologiques_radiologique = '';
    $this->medicaments = '';
    $this->date_entree = '';
    $this->heure_entree = '';
    $this->mode_entree = '';
    $this->date_sortie = '';
    $this->heure_sortie = '';
}


public function close()
{
    $this->resetInputs();
}

//edit utilisateur
    
public function editFicheNavette($id)
{
    $fiche_navette = FicheNavette::where('id', $id)->first();

    $this->fiche_navette_edit_id = $fiche_navette->id;

    $this->fiche_navette_id = $fiche_navette->fiche_navette_id;
    $this->admission_id = $fiche_navette->admission_id;
    $this->nom = $fiche_navette->nom;
    $this->prenom = $fiche_navette->prenom;
    $this->age = $fiche_navette->age;
    $this->date_naissance= $fiche_navette->date_naissance;
    $this->lieu_naissance = $fiche_navette->lieu_naissance;
    $this->service = $fiche_navette->service;
    $this->salle = $fiche_navette->salle;
    $this->num_lit= $fiche_navette->num_lit;
    $this->securite_social = $fiche_navette->securite_social;
    $this->num_assurance = $fiche_navette->num_assurance;
    $this->num_carte = $fiche_navette->num_carte;
    $this->actes_medicaux_chirurgicaux = $fiche_navette->actes_medicaux_chirurgicaux ;
    $this->bilan_biologiques_radiologique = $fiche_navette->bilan_biologiques_radiologique;
    $this->medicaments = $fiche_navette->medicaments;
    $this->date_entree = $fiche_navette->date_entree;
    $this->heure_entree = $fiche_navette->heure_entree;
    $this->mode_entree = $fiche_navette->mode_entree;
    $this->date_sortie = $fiche_navette->date_sortie;
    $this->heure_sortie = $fiche_navette->heure_sortie;
    
    $this->dispatchBrowserEvent('show-edit-fiche_navette-modal');
}

    public function editFicheNavetteData(){

        //on form submit validation
        $this->validate([
            'fiche_navette_id' => 'required|unique:fiche_navettes,fiche_navette_id,'.$this->fiche_navette_edit_id.'', //Validation with ignoring own data
            'admission_id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'service' => 'required',
            'salle' => 'required',
            'num_lit' => 'required',
            'securite_social' => 'required',
            'num_assurance' => 'required',
            'num_carte' => 'required',
            'actes_medicaux_chirurgicaux' => 'required',
            'bilan_biologiques_radiologique' => 'required',
            'medicaments' => 'required',
            'date_entree' => 'required',
            'heure_entree' => 'required',
            'mode_entree' => 'required',
            'date_sortie' => 'required',
            'heure_sortie' => 'required',  
    ]);

    $fiche_navette = FicheNavette::where('id', $this->fiche_navette_edit_id)->first();

        $fiche_navette ->fiche_navette_id = $this->fiche_navette_id;
        $fiche_navette ->admission_id = $this->admission_id;
        $fiche_navette ->nom = $this->nom;
        $fiche_navette ->prenom = $this->prenom;
        $fiche_navette ->age = $this->age;
        $fiche_navette ->date_naissance = $this->date_naissance;
        $fiche_navette ->lieu_naissance = $this->lieu_naissance;
        $fiche_navette ->service = $this->service;
        $fiche_navette ->salle = $this->salle;
        $fiche_navette ->num_lit = $this->num_lit;
        $fiche_navette ->securite_social = $this->securite_social;
        $fiche_navette ->num_assurance = $this->num_assurance;
        $fiche_navette ->num_carte = $this->num_carte;
        
        $fiche_navette ->actes_medicaux_chirurgicaux = 
        $this->actes_medicaux_chirurgicaux;
        
        $fiche_navette ->bilan_biologiques_radiologique = $this->bilan_biologiques_radiologique;
        $fiche_navette ->medicaments = $this->medicaments;
        $fiche_navette ->date_entree = $this->date_entree;
        $fiche_navette ->heure_entree = $this->heure_entree;
        $fiche_navette ->mode_entree = $this->mode_entree;
        $fiche_navette ->date_sortie = $this->date_sortie;
        $fiche_navette ->heure_sortie = $this->heure_sortie;

    $fiche_navette->save();


    session()->flash('message', 'Fiche Navette Mise à Jour Avec Succés');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

public function deleteConfirmation($id)
{
    $this->fiche_navette_delete_id = $id; //fiche navette id

    $this->dispatchBrowserEvent('show-delete-confirmation-modal');
}


public function deleteFicheNavetteData()
{
    $fiche_navette = FicheNavette::where('id', $this->fiche_navette_delete_id)->first();
    $fiche_navette->delete();


    session()->flash('message', 'Fiche Navette Supprimé avec Succés!');


    $this->dispatchBrowserEvent('close-modal');


    $this->fiche_navette_delete_id = '';
}

public function cancel()
{
    $this->fiche_navette_delete_id = '';
}

    //end delete utilisateur

    // view utilisateur

    public function viewFicheNavetteDetails($id)
    {
        $fiche_navette = FicheNavette::where('id', $id)->first();
        
        $this->view_fiche_navette_fiche_navette_id = $fiche_navette->fiche_navette_id;
        $this->view_fiche_navette_admission_id = $fiche_navette->admission_id;
        $this->view_fiche_navette_nom = $fiche_navette->nom;
        $this->view_fiche_navette_prenom = $fiche_navette->prenom;
        $this->view_fiche_navette_age = $fiche_navette->age;
        $this->view_fiche_navette_date_naissance= $fiche_navette->date_naissance;
        $this->view_fiche_navette_lieu_naissance = $fiche_navette->lieu_naissance;
        $this->view_fiche_navette_service = $fiche_navette->service;
        $this->view_fiche_navette_salle = $fiche_navette->salle;
        $this->view_fiche_navette_num_lit= $fiche_navette->num_lit;
        $this->view_fiche_navette_securite_social = $fiche_navette->securite_social;
        $this->view_fiche_navette_num_assurance = $fiche_navette->num_assurance;
        $this->view_fiche_navette_num_carte = $fiche_navette->num_carte;
        $this->view_fiche_navette_actes_medicaux_chirurgicaux = $fiche_navette->actes_medicaux_chirurgicaux ;
        
        $this->view_fiche_navette_bilan_biologiques_radiologique = $fiche_navette->bilan_biologiques_radiologique;
        $this->view_fiche_navette_medicaments = $fiche_navette->medicaments;
        $this->view_fiche_navette_date_entree = $fiche_navette->date_entree;
        $this->view_fiche_navette_heure_entree = $fiche_navette->heure_entree;
        $this->view_fiche_navette_mode_entree = $fiche_navette->mode_entree;
        $this->view_fiche_navette_date_sortie = $fiche_navette->date_sortie;
        $this->view_fiche_navette_heure_sortie = $fiche_navette->heure_sortie;

    
        $this->dispatchBrowserEvent('show-view-fiche_navette-modal');
    }
    
    
    public function closeViewFicheNavetteModal()
    {
    
        $this->view_fiche_navette_id = '';
        $this->view_fiche_navette_admission_id = '';
        $this->view_fiche_navette_nom = '';
        $this->view_fiche_navette_prenom = '';
        $this->view_fiche_navette_age = '';
        $this->view_fiche_navette_date_naissance= '';
        $this->view_fiche_navette_lieu_naissance = '';
        $this->view_fiche_navette_service = '';
        $this->view_fiche_navette_salle = '';
        $this->view_fiche_navette_num_lit= '';
        $this->view_fiche_navette_securite_social = '';
        $this->view_fiche_navette_num_assurance = '';
        $this->view_fiche_navette_num_carte = '';
        $this->view_fiche_navette_actes_medicaux_chirurgicaux = '';
        $this->view_fiche_navette_bilan_biologiques_radiologique = '';
        $this->view_fiche_navette_medicaments = '';
        $this->view_fiche_navette_date_entree = '';
        $this->view_fiche_navette_heure_entree = '';
        $this->view_fiche_navette_mode_entree = '';
        $this->view_fiche_navette_date_sortie = '';
        $this->view_fiche_navette_heure_sortie = '';

        $this->fiche_navette_edit_id = '';
    }
    

    // end view utilisateur

    public function render()
    {
        // get All ordonnances
        $fiche_navettes= FicheNavette::where('fiche_navette_id','like','%'.$this->searchTerm.'%')
        ->orWhere('admission_id','like','%'.$this->searchTerm.'%')
        ->orWhere('nom','like','%'.$this->searchTerm.'%')
        ->orWhere('prenom','like','%'.$this->searchTerm.'%')
        ->orWhere('date_naissance','like','%'.$this->searchTerm.'%')
        ->get(); 

        return view('livewire.fiche-navette-component',[

            'fiche_navettes'=>$fiche_navettes,
            'fiche_navettes'=>FicheNavette::paginate(2)

        ])->layout('livewire.layouts.base5')
          ->extends("layouts.master")
          ->section("contenu");
    }
}
