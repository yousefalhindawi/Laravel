<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class CarsController extends Controller
{

    public function getCategory($category = null, $items = null)
    {
        if (isset($category)) {

            if (isset($items)) {
                // return view('store' ,compact('category'),compact('items'));
                return "you are viewing the store for the  $category for  $items";
            }
            // return view('store' ,compact('category'));
            return "you are viewing the store for  $category ";
        }

        return "you are viewing the store of All cars";
    }

    public function getName(Request $request)
    {

        $car = car::all()->where('name', $request->input('name'));
        return view('cars/search', compact('car'));

        // GET
        //     if (request('name')){
        //     $name = request('name');
        //     $car = car::where('name', $name)->first();
        //     return view('cars/search',compact('car'));
        // }else {
        //     return view('cars/search');

        // }


    }
    public function getSearchNav(Request $request)
    {
        $searchInput = $request->input('searchCar');
        // User::where('id', 'like' '%searchInput%')->delete();
        $car = car::all()->where('name', $searchInput);
        return view('/searchNav', compact('car'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        $data = car::all();

        return View('cars.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET

        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST
        // \Log::info(json_encode($request->all()));

        //validation
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'year_made' => ['required', 'integer'],
        ]);

        $car = new Car();
        $car->name = strip_tags($request->input('name'));
        $car->color = strip_tags($request->input('color'));
        $car->year_made = strip_tags($request->input('year_made'));
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //GET
        $singleCar = car::findOrFail($id);
        return view('cars.singleCar', compact('singleCar'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //GET
        $editCar = car::findOrFail($id);
        return view('cars.edit', compact('editCar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //POST, PUT, PATCH
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'year_made' => ['required', 'integer'],
        ]);

        $updateCar = car::findOrFail($id);
        $updateCar->name = strip_tags($request->input('name'));
        $updateCar->color = strip_tags($request->input('color'));
        $updateCar->year_made = strip_tags($request->input('year_made'));
        $updateCar->save();
        return redirect()->route('cars.edit', $updateCar->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE
        $deleteCar = car::findOrFail($id);
        $deleteCar->delete();
        return redirect()->route('cars.index')->withSuccess(__('Car delete successfully.'));

        // if (isset($id)) {
            //     car::where('id', $id)->delete();
            //     return redirect()->route('cars.index');

        // }
    }
}
