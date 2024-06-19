<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\View;
use App\Models\Special;
use PDF;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specials = Special::orderBy('created_at', 'DESC')->get();
  
        return view('Specials.index', compact('specials'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Specials.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'dateReceived' => 'required',
        'Obligation' =>  ['required','regex:/^[A-z a-z 0-9]+$/','string','max:255'],
        'Dept' =>  ['required','regex:/^[A-z a-z -]+$/','string','max:255'],
        'Payee' => ['required','regex:/^[A-z a-z]+$/','string','max:255'],
        'Code' =>   ['required','regex:/^[A-z a-z 0-9]+$/','string','max:255'],
        'Name' => ['required','regex:/^[A-z a-z]+$/','string','max:255'],
        'Netdv' =>   ['required', 'numeric', 'regex:/^[0-9]+$/'],
        'Particulars' => ['required','regex:/^[A-z a-z . ,]+$/','string','max:255'],
        'Status' => 'required',
        'Transmittedto' => ['required','regex:/^[A-z a-z -]+$/','string','max:255'],
        'Remarks' => ['required','regex:/^[A-z a-z 0-9 , . -]+$/','string','max:255'],
        'Released' => 'required',
        'Check' => ['required', 'numeric', 'regex:/^[0-9]+$/'],
        'Issuance' => 'required',
        // Add more validation rules for other fields
    ]);


        Special::create($validatedData);

        return redirect()->route('special')->with('success', 'Record created successfully');
}

  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specials = Special::findOrFail($id);
  
        return view('Specials.show', compact('specials'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specials = Special::findOrFail($id);
  
        return view('Specials.edit', compact('specials'));
    }

    public function generatePdf()
    {
        $specials = Special::all();

        // Create a view with the data
        $pdfView = View::make('specials.pdf', compact('specials'));

        // Generate the PDF using DomPDF
        $pdf = PDF::loadHtml($pdfView)->setPaper('a4', 'landscape');

        // Uncomment the line below if you want to download the PDF
        // return $pdf->download('specials.pdf');

        // Comment the line below if you want to download the PDF
        return $pdf->stream('specials.pdf');
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'dateReceived' => 'required',
            'Obligation' =>  ['required','regex:/^[A-z a-z 0-9]+$/','string','max:255'],
            'Dept' =>  ['required','regex:/^[A-z a-z -]+$/','string','max:255'],
            'Payee' => ['required','regex:/^[A-z a-z]+$/','string','max:255'],
            'Code' =>   ['required','regex:/^[A-z a-z 0-9]+$/','string','max:255'],
            'Name' => ['required','regex:/^[A-z a-z]+$/','string','max:255'],
            'Netdv' =>   ['required', 'numeric', 'regex:/^[0-9]+$/'],
            'Particulars' => ['required','regex:/^[A-z a-z . ,]+$/','string','max:255'],
            'Status' => '',
            'Transmittedto' => ['required','regex:/^[A-z a-z -]+$/','string','max:255'],
            'Remarks' => ['required','regex:/^[A-z a-z 0-9 , . -]+$/','string','max:255'],
            'Released' => 'required',
            'Check' => ['required', 'numeric', 'regex:/^[0-9]+$/'],
            'Issuance' => 'required',
            // Add more validation rules for other fields
        ]);
        $specials = Special::findOrFail($id);
  
        $specials->update($request->all());
  
        return redirect()->route('special')->with('success', 'Special Educational Funds updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specials = Special::findOrFail($id);
  
        $specials->delete();
  
        return redirect()->route('special')->with('success', 'Special Educational Funds deleted successfully');
    }
}