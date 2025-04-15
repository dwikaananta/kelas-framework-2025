<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // untuk akses semua data car
    public function index()
    {
        $cars = Car::latest()
            ->where(function($query) {
                $search = request()->search;
                $query->where('code', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('engine_number', 'like', "%$search%");
            })
            ->paginate(10);

        return view('cars.index', [
            'cars' => $cars,
        ]);
    }

    // untuk menampilkan form create
    public function create()
    {
        // relasi data ke user
        $users = \App\Models\User::get();

        return view('cars.create', ['users' => $users]);
    }

    // untuk menyimpan hasil dari form create
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'user_id' => ['required'],
            'code' => ['required'],
            'name' => ['required'],
            'engine_number' => ['required', 'unique:cars,engine_number'],
        ]);

        // simpan data yang sudah di validasi
        $validated = [
            'user_id' => $request->user_id,
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

        // relasi data ke user
        $users = \App\Models\User::get();

        return view('cars.edit', ['car' => $car, 'users' => $users]);
    }

    // untuk menyimpan hasil dari form edit
    public function update(Request $request, $id)
    {
        // find by id
        $car = Car::find($id);

        // validasi
        $request->validate([
            'code' => ['required'],
            'name' => ['required'],
            'engine_number' => ['required', "unique:cars,engine_number,$car->id"],
        ]);

        // simpan data yang sudah di validasi
        $validated = [
            'code' => $request->code,
            'name' => $request->name,
            'engine_number' => $request->engine_number,
        ];

        // simpan data ke tabel database
        $car->update($validated);

        // redirect ke halaman cars
        return redirect('/cars')->with('success', 'Data has updated!');
    }

    // untuk menghapus dari car
    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('/cars')->with('success', 'Car has deleted !');
    }
}
