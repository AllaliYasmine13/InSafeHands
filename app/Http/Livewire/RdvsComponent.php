<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\Rdvs;
use Livewire\WithPagination;

class RdvsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $rdv_id, $nom, $prenom, $num_tel, $email, $medecin_traitant, $select_date, $commentaire, $rdv_edit_id, $rdv_delete_id;
    public $view_rdv_id, $view_rdv_nom, $view_rdv_prenom, $view_rdv_num_tel,$view_rdv_email,$view_rdv_medecin_traitant, $view_rdv_select_date, $view_rdv_commentaire;

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
        'medecin_traitant' => 'required',
        'select_date' => 'required',
        'commentaire' => 'required',
        
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
            'medecin_traitant' => 'required',
            'select_date' => 'required',
            'commentaire' => 'required',
        ]);

        //Add Student Data
        $rdv =new Rdvs();
        $rdv ->rdv_id = $this->rdv_id;
        $rdv ->nom = $this->nom;
        $rdv ->prenom = $this->prenom;
        $rdv ->num_tel = $this->num_tel;
        $rdv ->email = $this->email;
        $rdv ->medecin_traitant = $this->medecin_traitant;
        $rdv ->select_date = $this->select_date;
        $rdv ->commentaire = $this->commentaire;

        $rdv->save();

        session()->flash('message', 'New Render-Vous has been added successfully');

        $this->rdv_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->num_tel = '';
        $this->email = '';
        $this->medecin_traitant = '';
        $this->select_date = '';
        $this->commentaire = '';
        
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
    $this->medecin_traitant = '';
    $this->select_date = '';
    $this->commentaire = '';
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
    $this->medecin_traitant = $rdv->medecin_traitant;
    $this->select_date = $rdv->select_date;
    $this->commentaire = $rdv->commentaire;
    
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
            'medecin_traitant' => 'required',
            'select_date' => 'required',
            'commentaire' => 'required',
    ]);

    $rdv = Rdvs::where('id', $this->rdv_edit_id)->first();
    $rdv->rdv_id = $this->rdv_id;
    $rdv->nom = $this->nom;
    $rdv->prenom = $this->prenom;
    $rdv->num_tel = $this->num_tel;
    $rdv->email = $this->email;
    $rdv->medecin_traitant = $this->medecin_traitant;
    $rdv->select_date = $this->select_date;
    $rdv->commentaire = $this->commentaire;

    $rdv->save();


    session()->flash('message', 'Render-Vous has been updated successfully');


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


    session()->flash('message', 'RDV has been deleted successfully');


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
        $this->view_rdv_medecin_traitant = $rdv->medecin_traitant;
        $this->view_rdv_select_date = $rdv->select_date;
        $this->view_rdv_commentaire = $rdv->commentaire;
    
        $this->dispatchBrowserEvent('show-view-rdv-modal');
    }
    
    
    public function closeViewRdvModal()
    {
        $this->view_rdv_id = '';
        $this->view_rdv_nom = '';
        $this->view_rdv_prenom = '';
        $this->view_rdv_num_tel = '';
        $this->view_rdv_email = '';
        $this->view_rdv_medecin_traitant = '';
        $this->view_rdv_select_date= '';
        $this->view_rdv_commentaire = '';
        $this->rdv_edit_id = '';
    }
    

    // end view utilisateur

    public function render()
    {
        // get All rdvs
        $rdvs= Rdvs::where('nom','like','%'.$this->searchTerm.'%')->orWhere('prenom','like','%'.$this->searchTerm.'%')->orWhere('rdv_id','like','%'.$this->searchTerm.'%')->orWhere('select_date','like','%'.$this->searchTerm.'%')->get();

         return view('livewire.rdvs-component',[
            'rdvs'=>$rdvs,
            'rdvs'=>Rdvs::paginate(3)
            
            ])->layout('livewire.layouts.base2');
    }
}
