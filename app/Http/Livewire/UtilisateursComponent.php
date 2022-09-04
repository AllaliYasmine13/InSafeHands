<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\models\Utilisateurs;
use Livewire\WithPagination;

class UtilisateursComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $utilisateur_id, $nom, $prenom, $date_de_naissance, $email, $role, $utilisateur_edit_id, $utilisateur_delete_id;
    public $view_utilisateur_id, $view_utilisateur_nom, $view_utilisateur_prenom, $view_utilisateur_date_de_naissance,$view_utilisateur_email,$view_utilisateur_role;

    public $searchTerm;

//Input fields on update validation
public function updated($fields)
{
    $this->validateOnly($fields, [
        'utilisateur_id' => 'required|unique:utilisateurs,utilisateur_id,'.$this->utilisateur_edit_id.'', //Validation with ignoring own data
        'nom' => 'required',
        'prenom' => 'required',
        'date_de_naissance' => 'required',
        'email' => 'required|email',
        'role' => 'required',
        
    ]);
}
    public function storeUtilisateurData(){

        //on form submit validation
        $this->validate([
            'utilisateur_id' => 'required|unique:utilisateurs', // utilisateurs = table name
            'nom' => 'required',
            'prenom' => 'required',
            'date_de_naissance' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        //Add Student Data
        $utilisateur =new Utilisateurs();
        $utilisateur->utilisateur_id = $this->utilisateur_id;
        $utilisateur->nom = $this->nom;
        $utilisateur->prenom = $this->prenom;
        $utilisateur->date_de_naissance = $this->date_de_naissance;
        $utilisateur->email = $this->email;
        $utilisateur->role = $this->role;

        $utilisateur->save();

        session()->flash('message', 'New Utilisateur has been added successfully');

        $this->utilisateur_id = '';
        $this->nom = '';
        $this->prenom = '';
        $this->date_de_naissance = '';
        $this->email = '';
        $this->role = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
{
    $this->utilisateur_id = '';
    $this->nom = '';
    $this->prenom = '';
    $this->date_de_naissance = '';
    $this->email = '';
    $this->role = '';
    $this->utilisateur_edit_id = '';
}


public function close()
{
    $this->resetInputs();
}

//edit utilisateur
    
public function editUtilisateurs($id)
{
    $utilisateur = Utilisateurs::where('id', $id)->first();


    $this->utilisateur_edit_id = $utilisateur->id;
    $this->utilisateur_id = $utilisateur->utilisateur_id;
    $this->nom = $utilisateur->nom;
    $this->prenom = $utilisateur->prenom;
    $this->date_de_naissance = $utilisateur->date_de_naissance;
    $this->email = $utilisateur->email;
    $this->role = $utilisateur->role;
    
    $this->dispatchBrowserEvent('show-edit-utilisateur-modal');
}

    public function editUtilisateurData(){

        //on form submit validation
        $this->validate([
        'utilisateur_id' => 'required|unique:utilisateurs,utilisateur_id,'.$this->utilisateur_edit_id.'', //Validation with ignoring own data
        'nom' => 'required',
        'prenom' => 'required',
        'date_de_naissance' => 'required',
        'email' => 'required|email',
        'role' => 'required',
    ]);

    $utilisateur = Utilisateurs::where('id', $this->utilisateur_edit_id)->first();
    $utilisateur->utilisateur_id = $this->utilisateur_id;
    $utilisateur->nom = $this->nom;
    $utilisateur->prenom = $this->prenom;
    $utilisateur->date_de_naissance = $this->date_de_naissance;
    $utilisateur->email = $this->email;
    $utilisateur->role = $this->role;

    $utilisateur->save();


    session()->flash('message', 'Utilisateur has been updated successfully');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

public function deleteConfirmation($id)
{
    $this->utilisateur_delete_id = $id; //utilisateur id

    $this->dispatchBrowserEvent('show-delete-confirmation-modal');
}


public function deleteUtilisateurData()
{
    $utilisateur = Utilisateurs::where('id', $this->utilisateur_delete_id)->first();
    $utilisateur->delete();


    session()->flash('message', 'Utilisateur has been deleted successfully');


    $this->dispatchBrowserEvent('close-modal');


    $this->utilisateur_delete_id = '';
}

public function cancel()
{
    $this->utilisateur_delete_id = '';
}


    //end delete utilisateur

    // view utilisateur

    public function viewUtilisateurDetails($id)
    {
        $utilisateur = Utilisateurs::where('id', $id)->first();
    
    
        $this->view_utilisateur_id = $utilisateur->utilisateur_id;
        $this->view_utilisateur_nom = $utilisateur->nom;
        $this->view_utilisateur_prenom = $utilisateur->prenom;
        $this->view_utilisateur_date_de_naissance = $utilisateur->date_de_naissance;
        $this->view_utilisateur_email = $utilisateur->email;
        $this->view_utilisateur_role = $utilisateur->role;
    
        $this->dispatchBrowserEvent('show-view-utilisateur-modal');
    }
    
    
    public function closeViewUtilisateurModal()
    {
        $this->view_utilisateur_id = '';
        $this->view_utilisateur_nom = '';
        $this->view_utilisateur_prenom = '';
        $this->view_utilisateur_date_de_naissance = '';
        $this->view_utilisateur_email = '';
        $this->view_utilisateur_role = '';
        $this->utilisateur_edit_id = '';
    }
    

    // end view utilisateur


    public function render(){

        // get All Utilisateurs
        $utilisateurs= Utilisateurs::where('nom','like','%'.$this->searchTerm.'%')->orWhere('prenom','like','%'.$this->searchTerm.'%')->orWhere('utilisateur_id','like','%'.$this->searchTerm.'%')->orWhere('date_de_naissance','like','%'.$this->searchTerm.'%')->get();

        return view('livewire.utilisateurs-component',[
            'utilisateurs'=>$utilisateurs,
            // 'utilisateurs'=> Utilisateurs::paginate(3)

            ])->layout('livewire.layouts.base');
    }
}
