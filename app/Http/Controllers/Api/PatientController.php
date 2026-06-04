<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

use Illuminate\View\View;


class PatientController extends Controller
{




    public function listar()
    {
        $patient = Patient::all();
        return view('patient.list', compact('patient'));
    }

    public function create()
    {
        return view('patient.create');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.edit', compact('patient'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = Patient::all();
        return PatientResource::collection($patient);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $patient = Patient::create($request->validated());
        return new PatientResource($patient);
        //return redirect()->route('alumno')->with('success', '¡Alumno registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, string $id)
    {
        $patient = Patient::findOrFail($id);
        //$student = student::where('student_id', $id)->firstOrFail();
        $patient->update($request->validated());
        return new PatientResource($patient);
        //return redirect()->route('alumno')->with('success', '¡Alumno actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json(null, 204);
        //return redirect()->route('alumno')->with('success', '¡Alumno eliminado con éxito!');
    }
}
