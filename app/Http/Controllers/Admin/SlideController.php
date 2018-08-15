<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();

        return view('admin.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            do {
                $name = str_random(4) . '-' . $file->getClientOriginalName();
            }while (
                file_exists("upload/slide/.$name")
                // file_exists(config('app.newsUrl').'/'.$name)
            );
            
            $result = $request->except('avatar');
            $result['image_link'] = $name;
            //$file->move(config('app.newsUrl'), $name);
            $file->move("upload/slide/", $name);
            Slide::create($result);
        }
        return redirect()->route('slide.index')->with('success', __('Thêm slide thành công'));
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
        try {
            $slide = Slide::findOrFail($id);

            return view('admin.slide.edit', compact('slide'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
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
        try {
            $slide = Slide::findOrFail($id);
            $img_old = $slide->image_link;
            $result = $request->except('avatar');
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                do {
                    $name = str_random(4) . '-' . $file->getClientOriginalName();
                }while (
                    file_exists("upload/slide/.$name")
                    // file_exists(config('app.newsUrl').'/'.$name)
                );
                if(file_exists("upload/slide/".$img_old))
                    unlink("upload/slide/".$img_old);
                // $file->move(config('app.newsUrl'), $name);
                $file->move("upload/slide/", $name);
                $result['image_link'] = $name;
            } else {
               $result['image_link'] = $img_old;
            }
            $slide->update($result);

            return redirect()->route('slide.index')->with('success', __('Cập nhật thành công'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $slide = Slide::findOrFail($id);
            if (file_exists("upload/slide/".$slide->image_link))
                unlink("upload/slide/".$slide->image_link);
            $slide->delete();

            return redirect()->route('slide.index')->with('success', __('Xóa thành công'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }
}
