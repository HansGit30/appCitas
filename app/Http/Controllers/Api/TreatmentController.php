<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use App\Http\Resources\TreatmentResource;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar()
    {
        $treatment = Treatment::all();
        return view('treatment.list', compact('treatment'));
    }

    public function create()
    {
        $diagnosis = Diagnosis::all();
        $doctor = Doctor::all();
        return view('treatment.create', compact('diagnosis', 'doctor'));
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        $diagnosis = Diagnosis::all();
        $doctor = Doctor::all();
        return view('treatment.edit', compact('treatment','diagnosis','doctor'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatment = Treatment::all();
        return TreatmentResource::collection($treatment);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTreatmentRequest $request)
    {
        $treatment = Treatment::create($request->validated());
        //return new TreatmentResource($treatment);
        return redirect()->route('tratamiento')->with('success', '¡Tratamiento registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treatment = Treatment::findOrFail($id);
        return new TreatmentResource($treatment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTreatmentRequest $request, string $id)
    {
        $treatment = Treatment::findOrFail($id);
        //$student = student::where('student_id', $id)->firstOrFail();
        $treatment->update($request->validated());
        //return new TreatmentResource($treatment);
        return redirect()->route('tratamiento')->with('success', '¡Tratamiento actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();
        //return response()->json(null, 204);
        return redirect()->route('tratamiento')->with('success', '¡Tratamiento eliminado con éxito!');
    }
}
