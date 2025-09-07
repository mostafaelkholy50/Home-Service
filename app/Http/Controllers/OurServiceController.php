<?php

namespace App\Http\Controllers;

use App\Models\our_service as Service;
use App\Http\Requests\Storeour_serviceRequest;
use App\Http\Requests\Updateour_serviceRequest;
use Illuminate\Http\Request;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('Admin.service.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048',
       ]);

        $imagePath = $request->file('image')->store('service_images', 'public');

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('Admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && \Storage::disk('public')->exists($service->image)) {
                \Storage::disk('public')->delete($service->image);
            }
            $imagePath = $request->file('image')->store('service_images', 'public');
            $service->image = $imagePath;
        }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image && \Storage::disk('public')->exists($service->image)) {
            \Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully.');
    }
}
