<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['empleados']= Empleado::paginate(5);

        Paginator::useBootstrap();
        $empleados = Empleado::paginate(1);

        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'correo' => 'required|email|unique:empleados,correo',
            'foto' => 'required|image'
        ]);

        // $messages = [
        //     'nombre' => 'El :attribute es requerido',
        //     'size' => 'The :attribute must be exactly :size.',
        //     'between' => 'The :attribute value :input is not between :min - :max.',
        //     'in' => 'The :attribute must be one of the following types: :values',
        // ];
        
        $newEmpleado = new Empleado();
        $newEmpleado->nombre = $request->nombre;
        $newEmpleado->apellido_paterno = $request->apellido_paterno;
        $newEmpleado->apellido_materno = $request->apellido_materno;
        $newEmpleado->correo = $request->correo;
        
        if($request->hasFile('foto')){
            $newEmpleado->foto = $request->file('foto')->store('uploads', 'public');
        }
        

        $newEmpleado->save();

        return redirect()->route('empleado.index')->with('message', 'Registro exitoso');
        
        // obligas a que el orden de lo inputs (name) sea igual a la base de datos
        // $datosEmpleado = request()->except('_token');
        // Empleado::insert($datosEmpleado);
        // return $request;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'correo' => 'required|email|unique:empleados,correo,'.$empleado->id.',id'
        ]);

        // return $empleado;

        if ($request->foto) {
            unlink(storage_path('app/public/'.$empleado->foto));
            $empleado->foto = $request->file('foto')->store('uploads', 'public');
        }

        // $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido_paterno = $request->apellido_paterno;
        $empleado->apellido_materno = $request->apellido_materno;
        $empleado->correo = $request->correo;

        $empleado->update();

        return redirect()->route('empleado.index')->with('message', 'Actualización exitosa!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        //retornamos a la vista anterior y mandamos un mensaje
        return  back()->with('message', 'Registro eliminado con exito');
    }
}
