<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function listar()
    {
        $doctor = Doctor::all();
        return view('doctor.list', compact('doctor'));
    }

    public function create()
    {
        return view('doctor.create');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.edit', compact('doctor'));
    }



    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());
        //return new DoctorResource($doctor);
        return redirect()->route('medico')->with('success', '¡Medico registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        return new DoctorResource($doctor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, string $id)
    {
        $doctor = Doctor::findOrFail($id);
        //$student = student::where('student_id', $id)->firstOrFail();
        $doctor->update($request->validated());
        //return new DoctorResource($doctor);
        return redirect()->route('medico')->with('success', '¡Medico actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        //return response()->json(null, 204);
        return redirect()->route('medico')->with('success', '¡Medico eliminado con éxito!');
    }
}
