<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Postaudit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class PostAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postaudits = Postaudit::orderBy('created_at', 'DESC')->get();
  
        return view('postaudit.index', compact('postaudits'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postaudit.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email', 'unique:postaudits,email_address'],
            'Phone_number' => 'required|numeric|digits:11|unique:postaudits,Phone_number',
            'Role' => 'required|string|max:255',
        ]);

        Postaudit::create($request->all());
 
        return redirect()->route('postaudits')->with('success', 'Postaudit Users added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postaudits = Postaudit::findOrFail($id);
  
        return view('postaudit.show', compact('postaudits'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $postaudits = Postaudit::findOrFail($id);
  
        return view('postaudit.edit', compact('postaudits'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $postaudits = Postaudit::findOrFail($id);

        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email'],
            'Phone_number' => 'required|numeric|digits:11',
            'Role' => 'required|string|max:255',
        ]); 
  
        $postaudits->update($request->all());
  
        return redirect()->route('postaudits')->with('success', 'postaudits updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postaudits = Postaudit::findOrFail($id);
  
        $postaudits->delete();
  
        return redirect()->route('postaudits')->with('success', 'postaudits deleted successfully');
    }
}