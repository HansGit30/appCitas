<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar()
    {
        $appointment = Appointment::all();
        return view('appointment.list', compact('appointment'));
    }

    public function create()
    {
        return view('appointment.create');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.edit', compact('appointment'));
    }


    public function index()
    {
        $appointment = Appointment::all();
        return AppointmentResource::collection($appointment);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $appointment = appointment::create($request->validated());
        //return new StudentResource($student);
        return redirect()->route('alumno')->with('success', '¡Alumno registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = appointment::findOrFail($id);
        return new AppointmentResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, string $id)
    {
        $appointment = appointment::findOrFail($id);
        //$student = student::where('student_id', $id)->firstOrFail();
        $appointment->update($request->validated());
        return new AppointmentResource($appointment);
        //return redirect()->route('alumno')->with('success', '¡Alumno actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = appointment::findOrFail($id);
        $appointment->delete();
        return response()->json(null, 204);
        //return redirect()->route('alumno')->with('success', '¡Alumno eliminado con éxito!');
    }
}
