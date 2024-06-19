<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Preaudit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class PreAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preaudits = Preaudit::orderBy('created_at', 'DESC')->get();
  
        return view('preaudit.index', compact('preaudits'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('preaudit.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email', 'unique:preaudits,email_address'],
            'Phone_number' => 'required|numeric|digits:11|unique:preaudits,Phone_number',
            'Role' => 'required|string|max:255',
        ]);
        Preaudit::create($request->all());
 
        return redirect()->route('preaudits')->with('success', 'Preaduit Users added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $preaudits = Preaudit::findOrFail($id);
  
        return view('preaudit.show', compact('preaudits'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $preaudits = Preaudit::findOrFail($id);
  
        return view('preaudit.edit', compact('preaudits'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $preaudits = Preaudit::findOrFail($id);

        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email'],
            'Phone_number' => 'required|numeric|digits:11',
            'Role' => 'required|string|max:255',
        ]); 
  
        $preaudits->update($request->all());
  
        return redirect()->route('preaudits')->with('success', 'preaudits updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $preaudits = Preaudit::findOrFail($id);
  
        $preaudits->delete();
  
        return redirect()->route('preaudits')->with('success', 'preaudits deleted successfully');
    }
}