<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Minium;
use App\Models\Requie;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system_miniums = Minium::all();
        $system_requires = Requie::all();

        return view('admin.system.index', compact(['system_miniums','system_requires']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.system.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $system_minium          = new Minium();
        $system_minium->title   = $request->title;
        $system_minium->os      = $request->os;
        $system_minium->processor   = $request->processor;
        $system_minium->memory      = $request->memory;
        $system_minium->graphic     = $request->graphic;
        $system_minium->stogare     = $request->stogare;
        $system_minium->sound       = $request->sound;
        $system_minium->save();
        $message = 'Đã thêm cấu hình '.$request->title;
        $request->session()->flash('success', $message);
        return redirect()->route('systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system_minium = Minium::find($id);
        return view('admin.system.edit', compact('system_minium'));
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
        $system_minium          = Minium::find($id);
        $system_minium->title   = $request->title;
        $system_minium->os      = $request->os;
        $system_minium->processor   = $request->processor;
        $system_minium->memory      = $request->memory;
        $system_minium->graphic     = $request->graphic;
        $system_minium->stogare     = $request->stogare;
        $system_minium->sound       = $request->sound;
        $system_minium->save();
        $message = 'Đã cập nhật cấu hình '.$request->title;
        $request->session()->flash('success', $message);
        return redirect()->route('systems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $system_minium = Minium::find($id);
        $message = 'Đã xóa cấu hình '.$system_minium->title;
        $system_minium->delete();
        
        session()->flash('delete', $message);
        return redirect()->route('systems.index');
    }
}
