<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Produit;

class AddProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pizzas = Produit::where('type', 'pizza')->get();
        $desserts = Produit::where('type', 'dessert')->get();
        $boissons = Produit::where('type', 'boisson')->get();
       

        return view('pages.admin.addproduct', [
            'pizzas' => $pizzas,
            'desserts' => $desserts,
            'boissons' => $boissons,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'type' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nom' => 'required|string',
            'ingredients' => 'required|string',
            'description' => 'required|string',
            'taille' => 'nullable|string', 
            'prix' => 'required|numeric',
        ]);
    
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images');
            $validatedData['photo'] = $path; 
        }
    
        Produit::create($validatedData);
    
        
        return redirect()->back();     

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit=Produit::findOrFail($id); 
        // dd($edit);
        return view("pages.admin.editproduct", compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          
    $request->validate([
        'type' => 'required|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', 
        'nom' => 'required|string',
        'ingredients' => 'required|string',
        'description' => 'required|string',
        'taille' => 'nullable|string', 
        'prix' => 'required|numeric',
    ]);

    $produit = Produit::findOrFail($id);
  
    if ($request->hasFile('photo')) {

        $path = $request->file('photo')->store('public/images');
        $produit->photo = $path;
    }

    $produit->type = $request->input('type');
    $produit->nom = $request->input('nom');
    $produit->ingredients = $request->input('ingredients');
    $produit->description = $request->input('description');
    $produit->taille = $request->input('taille');
    $produit->prix = $request->input('prix');

    $produit->save();

        return redirect('/addproduct');
    }
    
    
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete  = Produit::findOrFail($id);
        $delete->delete();

        return redirect("/addproduct");
    }
}
