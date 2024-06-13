<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        $cars = Car::latest()->simplepaginate(10);
        return view('admin.mobil', compact('cars'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.car.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'         => 'required|string|max:255',
            'brand'   => 'required|string|max:255',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/cars', $image->hashName());

        //create product
        Car::create([
            'image'         => $image->hashName(),
            'name'         => $request->name,
            'brand'   => $request->brand,
        ]);

        //redirect to index
        return redirect()->route('admin.mobil')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
