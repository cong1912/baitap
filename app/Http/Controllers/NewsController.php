<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new =News::orderBy('id', 'desc')->get();
        return view('back-end.pages.news.index',compact('new'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'title' => "required",
            'content'=>"required",
        ]);
        //dd($request->all());
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data = $request->all();
        News::create([
            'title' => $data['title'],
            'category'=>$data['category'],
            'tomtat'=>$data['tomtat'],
            'image'=>$imageName,
            'content'=>$data['content'],
        ]);
        return redirect()->route('news.index')->withStatus(__('tạo bài viết thành công'));
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
        $new=News::find($id);
        return view('back-end.pages.news.edit',compact('new'));
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
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data = $request->all();
            News::find($id)->update([
                'title' => $data['title'],
                'category'=>$data['category'],
                'tomtat' => $data['tomtat'],
                'image'=>$imageName,
                'content'=>$data['content'],
            ]);
            return redirect()->route('news.index')->withStatus(__('cập nhật bài viết thành công'));
        }
        else{
            $data = $request->all();
            News::find($id)->update([
                'title' => $data['title'],
                'category'=>$data['category'],
                'content'=>$data['content'],
            ]);
            return redirect()->route('news.index')->withStatus(__('cập nhật bài viết thành công'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $new->delete();

        return redirect()->route('news.index')->withStatus(__('xóa bài viết thành công.'));
    }
}
