<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\models\Rdvs;
use Livewire\WithPagination;

class RdvsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    public $rdv_id, $nom, $prenom, $num_tel, $email, $service, $medecin_traitant, $select_date, $heure_debut, $heure_fin, $rdv_edit_id, $rdv_delete_id;
    
    public $view_rdv_id, $view_rdv_nom, $view_rdv_prenom, $view_rdv_num_tel, $view_rdv_email, $view_rdv_service, $view_rdv_medecin_traitant, $view_rdv_select_date, $view_rdv_heure_debut, $view_rdv_heure_fin ;

    public $searchTerm;
//Input fields on update validation

public function updated($fields)
{
    $this->validateOnly($fields, [
        'rdv_id' => 'required|unique:rdvs,rdv_id,'.$this->rdv_edit_id.'', //Validation with ignoring own data
        'nom' => 'required',
        'prenom' => 'required',
        'num_tel' => 'required',
        'email' => 'required|email',
        'service' => 'required',
        'medecin_traitant' => 'required',
        'select_date' => 'required',
        'heure_debut' => 'required',
        'heure_fin' => 'required',
        
    ]);
}
    public function storeRdvData(){

        //on form submit validation
        $this->validate([
            'rdv_id' => 'required|unique:rdvs', // rdv = table name
            'nom' => 'required',
            'prenom' => 'required',
            'num_tel' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'medecin_traitant' => 'required',
            'select_date' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        //Add Student Data
        $rdv =new Rdvs();
        $rdv ->rdv_id = $this->rdv_id;
        $rdv ->nom = $this->nom;
        $rdv ->prenom = $this->prenom;
        $rdv ->num_tel = $this->num_tel;
        $rdv ->email = $this->email;
        $rdv ->service = $this->service;
        $rdv ->medecin_traitant = $this->medecin_traitant;
        $rdv ->select_date = $this->select_date;
        $rdv ->heure_debut = $this->heure_debut;
        $rdv ->heure_fin = $this->heure_fin;

        $rdv->save();

        session()->flash('message', 'Nouveau Render-Vous Ajouter avec succés');

        $this->rdv_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->num_tel = '';
        $this->email = '';
        $this->service = '';
        $this->medecin_traitant = '';
        $this->select_date = '';
        $this->heure_debut = '';
        $this->heure_fin = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
{
    $this->rdv_id = '';
    $this->nom = '';
    $this->prenom = '';
    $this->num_tel = '';
    $this->email = '';
    $this->service = '';
    $this->medecin_traitant = '';
    $this->select_date = '';
    $this->heure_debut = '';
    $this->heure_fin = '';
    $this->rdv_edit_id = '';
}


public function close()
{
    $this->resetInputs();
}

//edit utilisateur
    
public function editRdvs($id)
{
    $rdv = Rdvs::where('id', $id)->first();


    $this->rdv_edit_id = $rdv->id;
    $this->rdv_id = $rdv->rdv_id;
    $this->nom = $rdv->nom;
    $this->prenom = $rdv->prenom;
    $this->num_tel = $rdv->num_tel;
    $this->email = $rdv->email;
    $this->service = $rdv->service;
    $this->medecin_traitant = $rdv->medecin_traitant;
    $this->select_date = $rdv->select_date;
    $this->heure_debut = $rdv->heure_debut;
    $this->heure_fin = $rdv->heure_fin;
    
    $this->dispatchBrowserEvent('show-edit-rdv-modal');
}

    public function editRdvData(){

        //on form submit validation
        $this->validate([
            'rdv_id' => 'required|unique:rdvs,rdv_id,'.$this->rdv_edit_id.'', //Validation with ignoring own data
            'nom' => 'required',
            'prenom' => 'required',
            'num_tel' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'medecin_traitant' => 'required',
            'select_date' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
    ]);

    $rdv = Rdvs::where('id', $this->rdv_edit_id)->first();
    $rdv->rdv_id = $this->rdv_id;
    $rdv->nom = $this->nom;
    $rdv->prenom = $this->prenom;
    $rdv->num_tel = $this->num_tel;
    $rdv->email = $this->email;
    $rdv->service = $this->service;
    $rdv->medecin_traitant = $this->medecin_traitant;
    $rdv->select_date = $this->select_date;
    $rdv->heure_debut = $this->heure_debut;
    $rdv->heure_fin = $this->heure_fin;

    $rdv->save();


    session()->flash('message', 'Render-Vous Mise à jour avec succés');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

public function deleteConfirmation($id)
{
    $this->rdv_delete_id = $id; //rdv id

    $this->dispatchBrowserEvent('show-delete-confirmation-modal');
}


public function deleteRdvData()
{
    $rdv = Rdvs::where('id', $this->rdv_delete_id)->first();
    $rdv->delete();


    session()->flash('message', 'Rendez-vous supprimé avec succés');


    $this->dispatchBrowserEvent('close-modal');


    $this->rdv_delete_id = '';
}

public function cancel()
{
    $this->rdv_delete_id = '';
}


    //end delete utilisateur

    // view utilisateur

    public function viewRdvDetails($id)
    {
        $rdv = Rdvs::where('id', $id)->first();
    
    
        $this->view_rdv_id = $rdv->rdv_id;
        $this->view_rdv_nom = $rdv->nom;
        $this->view_rdv_prenom = $rdv->prenom;
        $this->view_rdv_num_tel = $rdv->num_tel;
        $this->view_rdv_email = $rdv->email;
        $this->view_rdv_service = $rdv->service;
        $this->view_rdv_medecin_traitant = $rdv->medecin_traitant;
        $this->view_rdv_select_date = $rdv->select_date;
        $this->view_rdv_heure_debut = $rdv->heure_debut;
        $this->view_rdv_heure_fin = $rdv->heure_fin;
    
        $this->dispatchBrowserEvent('show-view-rdv-modal');
    }
    
    
    public function closeViewRdvModal()
    {
        $this->view_rdv_id = '';
        $this->view_rdv_nom = '';
        $this->view_rdv_prenom = '';
        $this->view_rdv_num_tel = '';
        $this->view_rdv_email = '';
        $this->view_rdv_service = '';
        $this->view_rdv_medecin_traitant = '';
        $this->view_rdv_select_date= '';
        $this->view_rdv_heure_debut = '';
        $this->view_rdv_heure_fin = '';
        $this->rdv_edit_id = '';
    }
    

    // end view utilisateur

    public function render()
    {
        // get All rdvs
        $rdvs= Rdvs::where('nom','like','%'.$this->searchTerm.'%')
        ->orWhere('prenom','like','%'.$this->searchTerm.'%')
        ->orWhere('rdv_id','like','%'.$this->searchTerm.'%')
        ->orWhere('select_date','like','%'.$this->searchTerm.'%')
        ->get();

         return view('livewire.rdvs-component',[
            'rdvs'=>$rdvs,
            'rdvs'=>Rdvs::paginate(4)
            
            ])->layout('livewire.layouts.base2')
              ->extends("layouts.master")
              ->section("contenu");
    }
}
