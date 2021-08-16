<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requie;


class SystemplusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.systemplus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $system_require          = new Requie();
        $system_require->title   = $request->title;
        $system_require->os      = $request->os;
        $system_require->processor   = $request->processor;
        $system_require->memory      = $request->memory;
        $system_require->graphic     = $request->graphic;
        $system_require->stogare     = $request->stogare;
        $system_require->sound       = $request->sound;
        $system_require->save();
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
        
        $system_require = Requie::find($id);
        return view('admin.systemplus.edit', compact('system_require'));
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
        $system_require          =  Requie::find($id);
        $system_require->title   = $request->title;
        $system_require->os      = $request->os;
        $system_require->processor   = $request->processor;
        $system_require->memory      = $request->memory;
        $system_require->graphic     = $request->graphic;
        $system_require->stogare     = $request->stogare;
        $system_require->sound       = $request->sound;
        $system_require->save();
        $message = 'Đã cập nhật cấu hình '.$system_require->title;
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
        $system_require = Requie::find($id);
        $message = 'Đã xóa cấu hình '.$system_require->title;
        $system_require->delete();
        
        session()->flash('delete', $message);
        return redirect()->route('systems.index');
    }
}
