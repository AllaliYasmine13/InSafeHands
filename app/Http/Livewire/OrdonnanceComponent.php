<?php

namespace App\Http\Livewire;
use App\models\Ordonnance;
use Livewire\WithPagination;

use Livewire\Component;

class OrdonnanceComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $ordonnance_id, $date_ordonnance, $service, $medecin_traitant, $nom, $prenom, $age, $ordonnance_edit_id, $ordonnance_delete_id;

    public $view_ordonnance_id, $view_ordonnance_date_ordonnance, $view_ordonnance_service, $view_ordonnance_medecin_traitant,$view_ordonnance_nom, $view_ordonnance_prenom, $view_ordonnance_age;

    public $searchTerm;
//Input fields on update validation

public function updated($fields)
{
    $this->validateOnly($fields, [
        'ordonnance_id' => 'required|unique:ordonnances,ordonnance_id,'.$this->ordonnance_edit_id.'', //Validation with ignoring own data
        'date_ordonnance' => 'required',
        'service' => 'required',
        'medecin_traitant' => 'required',
        'nom' => 'required',
        'prenom' => 'required',
        'age' => 'required',
        
    ]);
}
    public function storeOrdonnanceData(){

        //on form submit validation
        $this->validate([
            'ordonnance_id' => 'required|unique:ordonnances', // ordonnances = table name
            'date_ordonnance' => 'required',
            'service' => 'required',
            'medecin_traitant' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',           
        ]);

        //Add Student Data
        $ordonnance =new Ordonnance();
        $ordonnance ->ordonnance_id = $this->ordonnance_id;
        $ordonnance ->date_ordonnance = $this->date_ordonnance;
        $ordonnance ->service = $this->service;
        $ordonnance ->medecin_traitant = $this->medecin_traitant;
        $ordonnance ->nom = $this->nom;
        $ordonnance ->prenom = $this->prenom;
        $ordonnance ->age = $this->age;

        $ordonnance->save();

        session()->flash('message', 'Nouvelle Ordonnance Ajouté avec Succés');

        $this->ordonnance_id = '';
        $this->date_ordonnance = '';
        $this->service = '';
        $this->medecin_traitant= '';
        $this->nom = '';
        $this->prenom = '';
        $this->age = '';
        
        //For hide model after add student success 
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
{
        $this->ordonnance_id = '';
        $this->date_ordonnance = '';
        $this->service = '';
        $this->medecin_traitant= '';
        $this->nom = '';
        $this->prenom = '';
        $this->age = '';
}


public function close()
{
    $this->resetInputs();
}

//edit utilisateur
    
public function editOrdonnance($id)
{
    $ordonnance = Ordonnance::where('id', $id)->first();

    $this->ordonnance_edit_id = $ordonnance->id;
    $this->ordonnance_id = $ordonnance->ordonnance_id;
    $this->date_ordonnance= $ordonnance->date_ordonnance;
    $this->service = $ordonnance->service;
    $this->medecin_traitant = $ordonnance->medecin_traitant;
    $this->nom = $ordonnance->nom;
    $this->prenom= $ordonnance->prenom;
    $this->age = $ordonnance->age;
    
    $this->dispatchBrowserEvent('show-edit-ordonnance-modal');
}

    public function editOrdonnanceData(){

        //on form submit validation
        $this->validate([
            'ordonnance_id' => 'required|unique:ordonnances,ordonnance_id,'.$this->ordonnance_edit_id.'', //Validation with ignoring own data
            'date_ordonnance' => 'required',
            'service' => 'required',
            'medecin_traitant' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',  
    ]);

    $ordonnance = Ordonnance::where('id', $this->ordonnance_edit_id)->first();
    $ordonnance->ordonnance_id = $this->ordonnance_id;
    $ordonnance->date_ordonnance = $this->date_ordonnance;
    $ordonnance->service = $this->service;
    $ordonnance->medecin_traitant = $this->medecin_traitant;
    $ordonnance->nom = $this->nom;
    $ordonnance->prenom = $this->prenom;
    $ordonnance->age = $this->age;

    $ordonnance->save();


    session()->flash('message', 'Ordonnace Mise à Jour Avec Succés');


    //For hide modal after add student success
    $this->dispatchBrowserEvent('close-modal');


    }

    //end edit utilisateur

    //delete utilisateur

    //Delete Confirmation

public function deleteConfirmation($id)
{
    $this->ordonnance_delete_id = $id; //ordonnance id

    $this->dispatchBrowserEvent('show-delete-confirmation-modal');
}


public function deleteOrdonnanceData()
{
    $ordonnance = Ordonnance::where('id', $this->ordonnance_delete_id)->first();
    $ordonnance->delete();


    session()->flash('message', 'Ordonnace Supprimé avec Succés!');


    $this->dispatchBrowserEvent('close-modal');


    $this->ordonnance_delete_id = '';
}

public function cancel()
{
    $this->ordonnance_delete_id = '';
}


    //end delete utilisateur

    // view utilisateur

    public function viewOrdonnanceDetails($id)
    {
        $ordonnance = Ordonnance::where('id', $id)->first();
    
    
        $this->view_ordonnance_id = $ordonnance->ordonnance_id;
        $this->view_ordonnance_date_ordonnance = $ordonnance->date_ordonnance;
        $this->view_ordonnance_service = $ordonnance->service;
        $this->view_ordonnance_medecin_traitant = $ordonnance->medecin_traitant;
        $this->view_ordonnance_nom = $ordonnance->nom;
        $this->view_ordonnance_prenom = $ordonnance->prenom;
        $this->view_ordonnance_age = $ordonnance->age;
    
        $this->dispatchBrowserEvent('show-view-ordonnance-modal');
    }
    
    
    public function closeViewOrdonnanceModal()
    {
        $this->view_ordonnance_id = '';
        $this->view_ordonnance_date_ordonnance = '';
        $this->view_ordonnance_service = '';
        $this->view_ordonnance_medecin_traitant = '';
        $this->view_ordonnance_nom = '';
        $this->view_ordonnance_prenom = '';
        $this->view_ordonnance_age= '';

        $this->ordonnance_edit_id = '';
    }
    

    // end view utilisateur

    public function render()
    {
        // get All ordonnances
        $ordonnances= Ordonnance::where('ordonnance_id','like','%'.$this->searchTerm.'%')
        ->orWhere('nom','like','%'.$this->searchTerm.'%')
        ->orWhere('prenom','like','%'.$this->searchTerm.'%')
        ->get();

        return view('livewire.ordonnance-component', [

            'ordonnances'=>$ordonnances,
            'ordonnances'=>Ordonnance::paginate(2)
        ])->layout('livewire.layouts.base6')
          ->extends("layouts.master")
          ->section("contenu");
    }
}
