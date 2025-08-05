<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsType;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Show all news
    public function index()
    {
        $news = News::with('type')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // You can adjust pagination

        return view('news.index', compact('news'));
    }

    // Show a single news item
    public function show($slug)
    {
        $newsItem = News::with('type')->where('slug', $slug)->firstOrFail();

        return view('news.show', compact('newsItem'));
    }

    // Show news by type
    public function byType($slug)
    {
        $type = NewsType::where('slug', $slug)->firstOrFail();
        $news = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('news.by-type', compact('news', 'type'));
    }

    public function application()
    {
        $slug = 'ung-dung';
        $type = NewsType::where('slug', $slug)->firstOrFail();

        // Danh sách tin phân trang
        $news = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // 3 tin mới nhất (khác với phân trang, dùng get() và take(3))
        $latestNews = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.project', compact('news', 'latestNews', 'type'));
    }

    public function new()
    {
        $slug = 'tin-tuc';
        $type = NewsType::where('slug', $slug)->firstOrFail();

        // Danh sách tin phân trang
        $news = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // 3 tin mới nhất (khác với phân trang, dùng get() và take(3))
        $latestNews = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.project', compact('news', 'latestNews', 'type'));
    }

    public function product()
    {
        $slug = 'du-an';
        $type = NewsType::where('slug', $slug)->firstOrFail();

        // Danh sách tin phân trang
        $news = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // 3 tin mới nhất (khác với phân trang, dùng get() và take(3))
        $latestNews = News::where('news_type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.project', compact('news', 'latestNews', 'type'));
    }
}

