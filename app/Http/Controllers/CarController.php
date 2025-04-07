<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // untuk akses semua data car
    public function index()
    {
        $cars = Car::latest()->paginate(10);

        return view('cars.index', [
            'cars' => $cars,
        ]);
    }

    // untuk menampilkan form create
    public function create()
    {
        return view('cars.create');
    }

    // untuk menyimpan hasil dari form create
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'code' => ['required'],
            'name' => ['required'],
            'engine_number' => ['required', 'unique:cars,engine_number'],
        ]);

        // simpan data yang sudah di validasi
        $validated = [
            'code' => $request->code,
            'name' => $request->name,
            'engine_number' => $request->engine_number,
        ];

        // simpan data ke tabel database
        Car::create($validated);

        // redirect ke halaman cars
        return redirect('/cars')->with('success', 'Data has stored!');
    }

    // untuk menampilkan form edit
    public function edit($id)
    {
        $car = Car::find($id);

        return view('cars.edit', ['car' => $car]);
    }

    // untuk menyimpan hasil dari form edit
    public function update(Request $request, $id)
    {
        //
    }

    // untuk menghapus dari car
    public function destroy($id)
    {
        //
    }
}
