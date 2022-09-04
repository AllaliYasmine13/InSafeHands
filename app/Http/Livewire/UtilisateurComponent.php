<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class UtilisateurComponent extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $user_id, $name, $sexe, $date_naissance, $email, $password, $photo, $telephone1, $telephone2, $pieceIdentite, $numeroPieceIdentite, $user_edit_id, $user_delete_id;
    
    public $view_user_name, $view_user_photo, $view_user_sexe, $view_user_date_naissance, $view_user_email, $view_user_password, $view_user_pieceIdentite, $view_user_numeroPieceIdentite, $view_user_telephone1, $view_user_telephone2;

    public $searchTerm;

//Input fields on update validation
public function updated($fields)
{
    $this->validateOnly($fields, [
        'user_id' => 'required|unique:users,user_id,'.$this->user_edit_id.'', //Validation with ignoring own data
        'name' => 'required',
        'photo' => 'required',
        'sexe' => 'required',
        'date_naissance' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'pieceIdentite' => 'required',
        'numeroPieceIdentite' => 'required',
        'telephone1' => 'required',
        'telephone2' => 'required',
        
    ]);
}
    public function storeUserData(){

        //on form submit validation
        $this->validate([
            'user_id' => 'required|unique:users', // users = table name
            'name' => 'required',
            'photo' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'pieceIdentite' => 'required',
            'numeroPieceIdentite' => 'required',
            'telephone1' => 'required',
            'telephone2' => 'required',
        ]);

        //Add Student Data
        $user =new User();
        $user->user_id = $this->user_id;
        $user->name = $this->name;
        $user->photo = $this->photo;
        $user->sexe = $this->sexe;
        $user->date_naissance = $this->date_naissance;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->pieceIdentite = $this->pieceIdentite;
        $user->numeroPieceIdentite = $this->numeroPieceIdentite;
        $user->telephone1 = $this->telephone1;
        $user->telephone2 = $this->telephone2;

        $user->save();

        session()->flash('message', 'Nouveau Utilisateur Ajouté avec succés');

        $this->user_id = '';
        $this->name = '';
        $this->photo = '';
        $this->sexe = '';
        $this->date_naissance = '';
        $this->email = '';
        $this->password = '';
        $this->pieceIdentite = '';
        $this->numeroPieceIdentite = '';
        $this->telephone1 = '';
        $this->telephone2 = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
{
    $this->user_id = '';
    $this->name = '';
    $this->photo = '';
    $this->sexe = '';
    $this->date_naissance = '';
    $this->email = '';
    $this->password = '';
    $this->pieceIdentite = '';
    $this->numeroPieceIdentite = '';
    $this->telephone1 = '';
    $this->telephone2 = '';

    $this->user_edit_id = '';
}


public function close()
{
    $this->resetInputs();
}

//edit utilisateur
    
public function editUser($id)
{
    $user = User::where('id', $id)->first();


    $this->user_edit_id = $user->user_id;

    $this->user_id = $user->user_id;
    $this->name = $user->name;
    $this->photo = $user->photo;
    $this->sexe = $user->sexe;
    $this->date_naissance = $user->date_naissance;
    $this->email = $user->email;
    $this->password = $user->password;
    $this->pieceIdentite = $user->pieceIdentite;
    $this->numeroPieceIdentite = $user->numeroPieceIdentite;
    $this->telephone1 = $user->telephone1;
    $this->telephone2 = $user->telephone2;
    
    $this->dispatchBrowserEvent('show-edit-user-modal');
}

    public function editUserData(){

        //on form submit validation
        $this->validate([
        'user_id' => 'required|unique:users,id,'.$this->user_edit_id.'', //Validation with ignoring own data
        'name' => 'required',
        'photo' => 'required',
        'sexe' => 'required',
        'date_naissance' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'pieceIdentite' => 'required',
        'numeroPieceIdentite' => 'required',
        'telephone1' => 'required',
        'telephone2' => 'required',
    ]);

    $user = User::where('id', $this->user_edit_id)->first();
    
        $user->user_id = $this->user_id;
        $user->name = $this->name;
        $user->photo = $this->photo;
        $user->sexe = $this->sexe;
        $user->date_naissance = $this->date_naissance;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->pieceIdentite = $this->pieceIdentite;
        $user->numeroPieceIdentite = $this->numeroPieceIdentite;
        $user->telephone1 = $this->telephone1;
        $user->telephone2 = $this->telephone2;

    $user->save();


    session()->flash('message', 'Utilisateur Mise à Jour avec succés');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

public function deleteConfirmation($id)
{
    $this->user_delete_id = $id; //utilisateur id

    $this->dispatchBrowserEvent('show-delete-confirmation-modal');
}


public function deleteUtilisateurData()
{
    $user = User::where('id', $this->user_delete_id)->first();
    $user->delete();


    session()->flash('message', 'Utilisateur Supprimé avec succés');


    $this->dispatchBrowserEvent('close-modal');


    $this->user_delete_id = '';
}

public function cancel()
{
    $this->user_delete_id = '';
}


    //end delete utilisateur

    // view utilisateur

    public function viewUserDetails($id)
    {
        $user = User::where('id', $id)->first();

        $this->view_user_user_id = $user->user_id;
        $this->view_user_name = $user->name;
        $this->view_user_photo = $user->photo;
        $this->view_user_sexe = $user->sexe;
        $this->view_user_date_naissance = $user->date_naissance;
        $this->view_user_email = $user->email;
        $this->view_user_password = $user->password;
        $this->view_user_pieceIdentite = $user->pieceIdentite;
        $this->view_user_numeroPieceIdentite = $user->numeroPieceIdentite;
        $this->view_user_telephone1 = $user->telephone1;
        $this->view_user_telephone2 = $user->telephone2;
    
        $this->dispatchBrowserEvent('show-view-user-modal');
    }
    
    
    public function closeViewUserModal()
    {
        $this->view_user_user_id = '';
        $this->view_user_name = '';
        $this->view_user_photo = '';
        $this->view_user_sexe = '';
        $this->view_user_date_naissance = '';
        $this->view_user_email = '';
        $this->view_user_password = '';
        $this->view_user_pieceIdentite = '';
        $this->view_user_numeroPieceIdentite = '';
        $this->view_user_telephone1 = '';
        $this->view_user_telephone2 = '';

        $this->user_edit_id = '';
    }
    

    // end view utilisateur


    public function render()
    {
        // get All Utilisateurs
        $users= User::where('name','like','%'.$this->searchTerm.'%')->orWhere('date_naissance','like','%'.$this->searchTerm.'%')->orWhere('id','like','%'.$this->searchTerm.'%')->orWhere('email','like','%'.$this->searchTerm.'%')->get();

        return view('livewire.utilisateur-component', [

            'users'=>$users,
            'users'=> User::paginate(3)

        ])->layout('livewire.layouts.base7');
    }
}
