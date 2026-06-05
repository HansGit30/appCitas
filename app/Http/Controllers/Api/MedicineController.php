<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Http\Resources\MedicationResource;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar()
    {
        $medicine = Medication::all();
        return view('medicine.list', compact('medicine'));
    }

    public function create()
    {
        return view('medicine.create');
    }

    public function edit($id)
    {
        $medicine = Medication::findOrFail($id);
        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicine = Medication::all();
        return MedicationResource::collection($medicine);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationRequest $request)
    {
        $medicine = Medication::create($request->validated());
        return new MedicationResource($medicine);
        //return redirect()->route('alumno')->with('success', '¡Alumno registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medication::findOrFail($id);
        return new MedicationResource($medicine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, string $id)
    {
        $medicine = Medication::findOrFail($id);
        //$student = student::where('student_id', $id)->firstOrFail();
        $medicine->update($request->validated());
        return new MedicationResource($medicine);
        //return redirect()->route('alumno')->with('success', '¡Alumno actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medication::findOrFail($id);
        $medicine->delete();
        return response()->json(null, 204);
        //return redirect()->route('alumno')->with('success', '¡Alumno eliminado con éxito!');
    }
}
