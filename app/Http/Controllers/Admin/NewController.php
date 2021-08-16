<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newpost;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = '';
        $news= Newpost::orderBy('id','desc');
        if($request->search){
            $news->where('title', 'like', "%$request->search%");
        }
        $news = $news->paginate(5);;
        return view('admin.new.index', compact(['news','search']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news    = new Newpost();
        $news->title        = $request->title;
        $news->video        = $request->video;
        $news->body         = $request->body;
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            //tạo đường dẫn  và tên file ảnh
            $path = $image->store('image', 'public');

            //lưu tên file ảnh vào csdl
            $news->image = $path;
        }
        $news ->save();
        $message = '* Đã thêm tin mới "'.$news->title.'"';
        $request->session()->flash('success', $message);
        return redirect()->route('news.index');
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
        $news   = Newpost::find($id);
        return view('admin.new.edit',compact('news'));
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
        $news   = Newpost::find($id);
        $news->title        = $request->title;
        $news->video        = $request->video;
        $news->body         = $request->body;
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            //tạo đường dẫn  và tên file ảnh
            $path = $image->store('image', 'public');

            //lưu tên file ảnh vào csdl
            $news->image = $path;
        }
        $news ->save();
        $message = '* Đã thêm chỉnh sửa "'.$news->title.'"';
        $request->session()->flash('success', $message);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Newpost::find($id);
        $message = '* Đã xóa tin "'.$news->title.'"';
        $news->delete();
        
        session()->flash('delete', $message);
        return redirect()->route('news.index');
    }
}
