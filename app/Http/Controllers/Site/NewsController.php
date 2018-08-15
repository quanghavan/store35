<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
	private function getNewsNew()
	{
		return News::getNewsSide()->get();
	}

    public function index()
    {
    	$news = News::paginate(config('app.per_page'));
    	$news_new = $this->getNewsNew();

    	return view('site.news.index', compact('news', 'news_new'));
    }

    public function view(Request $request, $id)
    {
    	$news = News::findOrFail($id);
    	$news_new = $this->getNewsNew();

    	return view('site.news.view', compact('news', 'news_new'));
    }

    public function search(Request $request)
    {
    	$key = $request->key;
    	if ($key == "") {
    		return back();
    	}
    	$news_new = $this->getNewsNew();
    	$news = News::search($key);
    	$news->withPath(route('site.news.index') . '?key=' . $key);

    	return view('site.news.index', compact('news', 'news_new'));
    }
}
