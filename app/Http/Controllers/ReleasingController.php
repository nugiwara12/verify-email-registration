<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Releasing;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class ReleasingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $releasings = Releasing::orderBy('created_at', 'DESC')->get();
  
        return view('releasing.index', compact('releasings'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('releasing.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email', 'unique:releasings,email_address'],
            'Phone_number' => 'required|numeric|digits:11|unique:releasings,Phone_number',
            'Role' => 'required|string|max:255',
        ]);
        
        Releasing::create($request->all());
 
        return redirect()->route('releasings')->with('success', 'Releasing Users added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $releasings = Releasing::findOrFail($id);
  
        return view('releasing.show', compact('releasings'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $releasings = Releasing::findOrFail($id);
  
        return view('releasing.edit', compact('releasings'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $releasings = Releasing::findOrFail($id);

        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email'],
            'Phone_number' => 'required|numeric|digits:11',
            'Role' => 'required|string|max:255',
        ]); 
  
        $releasings->update($request->all());
  
        return redirect()->route('releasings')->with('success', 'Releasing updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $releasings = Releasing::findOrFail($id);
  
        $releasings->delete();
  
        return redirect()->route('releasings')->with('success', 'Releasing deleted successfully');
    }
}