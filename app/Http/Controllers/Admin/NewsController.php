<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            do {
                $name = str_random(4) . '-' . $file->getClientOriginalName();
            }while (
                file_exists(config('app.newsUrl').'/'.$name)
            );
            
            $result = $request->except('avatar');
            $result['avatar'] = $name;
            $file->move(config('app.newsUrl'), $name);
            News::create($result);
        }
        return redirect()->route('news.index')->with('success', __('Thêm tin tức thành công'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
            $news = News::findOrFail($id);

            return view('admin.news.edit', compact('news'));
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
    public function update(NewsUpdateRequest $request, $id)
    {
        try {
            $news = News::findOrFail($id);
            $img_old = $news->avatar;
            $result = $request->except('avatar');
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                do {
                    $name = str_random(4) . '-' . $file->getClientOriginalName();
                }while (
                    file_exists(config('app.newsUrl') . '/' . $name)
                );
                if(file_exists(config('app.newsUrl') . '/' . $img_old))
                    unlink(config('app.newsUrl') . '/' . $img_old);
                $file->move(config('app.newsUrl'), $name);
                $result['avatar'] = $name;
            } else {
               $result['avatar'] = $img_old;
            }
            $news->update($result);

            return redirect()->route('news.index')->with('success', __('Cập nhật thành công'));
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
    public function destroy($id)
    {
        //
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
            $news = News::findOrFail($id);
            if(file_exists(config('app.newsUrl').'/'.$img_old))
                unlink(config('app.newsUrl').'/'.$img_old);
            $news->delete();

           return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function delMulNews(Request $request)
    {
        try {
            $news = News::find($request->allVals)->toArray();
            foreach ($news as $value) {
                if(file_exists(config('app.newsUrl').'/'.$value->avatar))
                    unlink(config('app.newsUrl').'/'.$value->avatar);
            }
            News::destroy($request->allVals);

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }
}
