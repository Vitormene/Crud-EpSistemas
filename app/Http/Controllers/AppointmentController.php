<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('ativo', true)->get();
        return view('dashboard', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'contact' => 'required|string|max:255',
            'cpf' => 'required|string|',
            'cep' => 'required|string|',
            'conversion_origin' => 'string',
            'descricao' => 'string|max:255',
            'tipo' => 'integer',
            'observacoes' => 'string|max:255'
        ]);
        $validatedData['cpf'] = preg_replace('/\D/', '', $validatedData['cpf']);
        $validatedData['cep'] = preg_replace('/\D/', '', $validatedData['cep']);
        $validatedData['ativo'] = true;
        try {
            Appointment::create($validatedData);
            return redirect()->back()->with('success', 'Atendimento criado com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar o atendimento.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'contact' => 'required|string|max:255',
            'cpf' => 'required|string|',
            'cep' => 'required|string|',
            'conversion_origin' => 'string',
            'descricao' => 'string|max:255',
            'tipo' => 'integer',
            'observacoes' => 'string|max:255'
        ]);
        $validatedData['cpf'] = preg_replace('/\D/', '', $validatedData['cpf']);
        $validatedData['cep'] = preg_replace('/\D/', '', $validatedData['cep']);
        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);
    
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->ativo = false;
        $appointment->save();
        return response()->json(['success' => true]);
    }
}
