<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Encoder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class EncoderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encoders = Encoder::orderBy('created_at', 'DESC')->get();
  
        return view('encoder.index', compact('encoders'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('encoder.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email', 'unique:encoders,email_address'],
            'Phone_number' => 'required|numeric|digits:11|unique:encoders,Phone_number',
            'Role' => 'required|string|max:255',
        ]);

        Encoder::create($request->all());
 
        return redirect()->route('encoders')->with('success', 'Encoder Users added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encoders = Encoder::findOrFail($id);
  
        return view('encoder.show', compact('encoders'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encoders = Encoder::findOrFail($id);
  
        return view('encoder.edit', compact('encoders'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $encoders = Encoder::findOrFail($id);

        $request->validate([
            'Fname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'Lname' => ['required', 'regex:/^[A-Z a-z]+$/i', 'string', 'max:255'],
            'email_address' => ['required', 'regex:/^[A-Za-z0-9@_.]+$/i', 'string', 'max:255', 'email'],
            'Phone_number' => 'required|numeric|digits:11',
            'Role' => 'required|string|max:255',
        ]); 
  
        $encoders->update($request->all());
  
        return redirect()->route('encoders')->with('success', 'Encoder updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encoders = Encoder::findOrFail($id);
  
        $encoders->delete();
  
        return redirect()->route('encoders')->with('success', 'Encoders deleted successfully');
    }
}