<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\DocumentRep;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class DocumentRepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document_reps = DocumentRep::orderBy('created_at', 'DESC')->get();
  
        return view('documentrep.index', compact('document_reps'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documentrep.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email', 'unique:document_reps,email_address'],
            'Phone_number' => 'required|numeric|digits:11|unique:document_reps,Phone_number',
            'Role' => 'required|string|max:255',
        ]);
        DocumentRep::create($request->all());
 
        return redirect()->route('documentreps')->with('success', 'DocumentRep Users added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document_reps = DocumentRep::findOrFail($id);
  
        return view('documentrep.show', compact('document_reps'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document_reps = DocumentRep::findOrFail($id);
  
        return view('documentrep.edit', compact('document_reps'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $document_reps = DocumentRep::findOrFail($id);

        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email'],
            'Phone_number' => 'required|numeric|digits:11',
            'Role' => 'required|string|max:255',
        ]); 
  
        $document_reps->update($request->all());
  
        return redirect()->route('documentreps')->with('success', 'DocumentRep updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document_reps = DocumentRep::findOrFail($id);
  
        $document_reps->delete();
  
        return redirect()->route('documentreps')->with('success', 'DocumentRep deleted successfully');
    }
}