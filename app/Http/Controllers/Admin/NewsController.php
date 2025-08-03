<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // ✅ Import this

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('type')->paginate(10);
        return view('pages.admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('pages.admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:tin tuc,du an,ung dung', // giữ nguyên
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        // Tìm NewsType tương ứng
        $typeModel = NewsType::where('slug', Str::slug($data['type']))->first();

        if (!$typeModel) {
            return redirect()->back()->withErrors(['type' => 'Loại bài viết không hợp lệ']);
        }

        $data['news_type_id'] = $typeModel->id;
        $data['slug'] = Str::slug($data['title']);

        unset($data['type']); // không lưu trường type chuỗi nữa

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Tạo bài viết thành công');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('pages.admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:tin tuc,du an,ung dung',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            // Optional: delete old image
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy(News $news)
    {
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Xóa bài viết thành công');
    }
}
