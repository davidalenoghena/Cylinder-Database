<?php

namespace App\Http\Controllers;

use App\Cylinder;
use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CylinderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cylinders = DB::table('cylinders')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('admin.cylinder.cylinder', 
                    [
                        'cylinders' => $cylinders,
                    ]);
    }

    public function search(Request $request)
    {
        $your_search = $request->search;
        $cylinders = DB::table('cylinders')
                            ->select(DB::raw("*"))
                            ->where('serial_number', 'like', '%'.$request->search.'%')
                            ->paginate(10);
        return view('admin.search.cylinder',
                    [
                        'cylinders' => $cylinders,
                        'your_search' => $your_search,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cylinder.create_cylinder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'weight' => 'required',
            'manufacture_date' => 'required',
            'shelf_life' => 'required',
            'country_of_origin' => 'required',
            'source' => 'required',
            'source_address' => 'required',
            'current_location' => 'required',
        ]);
                
        $cylinder = new Cylinder();
        $cylinder->serial_number = $request->serial_number;
        $cylinder->weight = $request->weight;
        $cylinder->manufacture_date = $request->manufacture_date;
        $cylinder->shelf_life = $request->shelf_life;
        $cylinder->country_of_origin = $request->country_of_origin;
        $cylinder->source = $request->source;
        $cylinder->source_address = $request->source_address;
        $cylinder->current_location = $request->current_location;
        $cylinder->save();

        $history = new History();
        $history->serial_number = $request->serial_number;
        $history->current_location = $request->current_location;
        $history->save();
        $request->session()->flash('success', 'Cylinder Added successfully');
        return redirect()->route('admin.cylinder');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function show($cylinder)
    {
        $cylinder_data = Cylinder::find($cylinder);
        return view('admin.cylinder.cylinder_show', ['cylinder_data' => $cylinder_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function edit($cylinder)
    {
        $cylinder = Cylinder::find($cylinder);
        return view('admin.cylinder.edit_cylinder', ['cylinder' => $cylinder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cylinder)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'weight' => 'required',
            'manufacture_date' => 'required',
            'shelf_life' => 'required',
            'country_of_origin' => 'required',
            'source' => 'required',
            'source_address' => 'required',
            'current_location' => 'required',
        ]);
        $data = array(
            'serial_number' => $request->input('serial_number'),
            'weight' => $request->input('weight'),
            'manufacture_date' => $request->input('manufacture_date'),
            'shelf_life' => $request->input('shelf_life'),
            'country_of_origin' => $request->input('country_of_origin'),
            'source' => $request->input('source'),
            'source_address' => $request->input('source_address'),
            'current_location' => $request->input('current_location'),
        );
        Cylinder::where('id', $cylinder)->update($data);
        
        $history = new History();
        $history->serial_number = $request->serial_number;
        $history->current_location = $request->current_location;
        $history->save();
        return redirect('/admin/cylinder')->with('success', 'Cylinder updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cylinder  $cylinder
     * @return \Illuminate\Http\Response
     */
    public function destroy($cylinder)
    {
        Cylinder::where('id', $cylinder)->delete();   
        return redirect('/admin/cylinder')->with('success', 'Cylinder deleted successfully!');
    }
}
