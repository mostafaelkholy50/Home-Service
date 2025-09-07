<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\our_service as Service;
use Illuminate\Support\Facades\Storage;
use App\Models\Our_Provider as Provider;
use App\Http\Requests\StoreOurProviderRequest;
use App\Http\Requests\UpdateOurProviderRequest;

class OurProviderController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::with(['user', 'service'])->latest()->get();
        return view('Admin.provider.provider', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'provider')
            ->whereDoesntHave('provider')
            ->get();

        $services = Service::all();

        return view('Admin.provider.create', compact('users', 'services'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'bio' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
        ]);

        Provider::create($validatedData);

        return redirect()->route('admin.provider.index')->with('success', 'Provider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $users = User::all();
        $services = Service::all();
        return view('admin.provider.edit', compact('provider', 'users', 'services'));
    }

 public function createServiceForm()
    {
        // Get all available services to show in a dropdown list
        $services = Service::all();
        return view('provider.create_service', compact('services'));
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeService(Request $request)
    {
        // Validation of the form data
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'service_id' => 'required|exists:our_services,id',
            'phone' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $user = Auth::user();

        // Handle image upload for the user
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
            $user->save();
        }

        // Check if the provider already exists
        $provider = Provider::where('user_id', $user->id)->first();

        if ($provider) {
            // If provider exists, update the record
            $provider->update([
                'service_id' => $request->service_id,
                'phone' => $request->phone,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            return redirect()->route('dashboard')->with('success', 'Service details updated successfully!');
        } else {
            // If provider does not exist, create a new record
            Provider::create([
                'user_id' => $user->id,
                'service_id' => $request->service_id,
                'phone' => $request->phone,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            return redirect()->route('dashboard')->with('success', 'Service added successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('admin.provider.index')->with('success', 'Provider deleted successfully.');
    }
    public function Service(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        $service = Service::findOrFail($request->service_id);
        $providers = $service->providers()->with('user')->get();

        return view('service', compact('providers'));

    }
    public function AllService(Request $request)
    {
        $services = Service::all();
        $selectedService = $request->input('service_id');

        if ($selectedService && $selectedService !== 'all') {
            // فلترة حسب الخدمة المختارة
            $providers = Provider::with(['user', 'service'])
                ->where('service_id', $selectedService)
                ->get();
        } else {
            // عرض الكل
            $providers = Provider::with(['user', 'service'])->get();
        }
        return view('AllService', compact('services', 'providers', 'selectedService'));

    }
    public function provider(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:our__providers,id',
        ]);

        $provider = Provider::with(['user', 'service'])->findOrFail($request->provider_id);
        return view('provider', compact('provider'));
    }
}
