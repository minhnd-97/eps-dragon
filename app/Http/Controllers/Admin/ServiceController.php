<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('pages.admin.services.index', compact('services'));
    }

    public function edit(Service $service)
    {
        return view('pages.admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service->update($request->only('title', 'description'));

        return redirect()->route('admin.services.index')->with('success', 'Cập nhật thành công');
    }
}
