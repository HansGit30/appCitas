<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiagnosisRequest;
use App\Http\Requests\UpdateDiagnosisRequest;
use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function listar()
    {
        $diagnosis = Diagnosis::all();
        return view('diagnosis.list', compact('diagnosis'));
    }

    public function create()
    {
        $patient = Patient::all();
        $doctor = Doctor::all();
        return view('diagnosis.create', compact('patient', 'doctor'));
    }

    public function edit($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $patient = Patient::all();
        $doctor = Doctor::all();
        return view('diagnosis.edit', compact('diagnosis','patient','doctor'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosis = Diagnosis::all();
        return DiagnosisResource::collection($diagnosis);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiagnosisRequest $request)
    {
        $diagnosis = Diagnosis::create($request->validated());
        //return new DiagnosisResource($diagnosis);
        return redirect()->route('diagnostico')->with('success', '¡Diagnostico registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return new DiagnosisResource($diagnosis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiagnosisRequest $request, string $id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        //$student = student::where('student_id', $id)->firstOrFail();
        $diagnosis->update($request->validated());
        //return new DiagnosisResource($diagnosis);
        return redirect()->route('diagnostico')->with('success', '¡Diagnostico actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        $diagnosis->delete();
        //return response()->json(null, 204);
        return redirect()->route('diagnostico')->with('success', '¡Diagnostico eliminado con éxito!');
    }
}
