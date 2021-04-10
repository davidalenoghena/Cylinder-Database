<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
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
        $histories = DB::table('histories')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('admin.history.history', ['histories' => $histories]);
    }

    public function search(Request $request)
    {
        $your_search = $request->search;
        $histories = DB::table('histories')
                            ->select(DB::raw("*"))
                            ->where('serial_number', 'like', '%'.$request->search.'%')
                            ->paginate(10);
        return view('admin.search.history', 
                    [
                        'histories' => $histories,
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
        return view('admin.history.create_history');
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
            'current_location' => 'required',
        ]);
                
        $history = new History();
        $history->serial_number = $request->serial_number;
        $history->current_location = $request->current_location;
        $history->save(); 
        $request->session()->flash('success', 'History Added successfully');
        return redirect()->route('admin.history');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show($serial)
    {
        //$his_data = History::find($history);
        //$serial = $his_data->serial_number;
        $history_datas = DB::table('histories')
                            ->select(DB::raw("*"))
                            ->where('serial_number', $serial)
                            ->paginate(10);
        return view('admin.history.history_show', [
            'history_datas' => $history_datas,
            'serial' => $serial,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit($history)
    {
        $history_data = History::find($history);
        return view('admin.history.edit_history', ['history_data' => $history_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $history)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'current_location' => 'required',
        ]);
        $data = array(
            'serial_number' => $request->input('serial_number'),
            'current_location' => $request->input('current_location'),
        );
        History::where('id', $history)->update($data);
        return redirect('/admin/history')->with('success', 'History updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy($history)
    {
        History::where('id', $history)->delete();   
        return redirect('/admin/history')->with('success', 'History deleted successfully!');
    }
}
