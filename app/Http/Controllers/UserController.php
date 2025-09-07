<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
       public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        $users = $query->get();

        return view('admin.user.user', compact('users'));
    }

    // -----------------User Management-----------------
    public function ShowUser()
    {
        $users = User::paginate(10); // Assuming you have a User model
        return view('Admin.user.user', compact('users'));
    }
    public function create()
    {
        // Logic to show the form for creating a new resource
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,user,provider',
            'address' => 'required',
            'phone' => 'required|numeric',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'address' => $request->address,
            'phone' => $request->phone,
            'profile_image' => $imagePath,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }
    public function edit(user $user)
    {
        // Logic to show the form for editing a specific resource
        return view('Admin.user.edit', compact('user'));
    }
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user,provider',
            'address' => 'required',
            'phone' => 'required|numeric',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && \Storage::disk('public')->exists($user->profile_image)) {
                \Storage::disk('public')->delete($user->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        } else {
            $imagePath = $user->profile_image;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'phone' => $request->phone,
            'profile_image' => $imagePath,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }
    public function destroy(user $user)
    {
        $user->profile_image && \Storage::disk('public')->exists($user->profile_image) ? \Storage::disk('public')->delete($user->profile_image) : null;
        $user->delete(); // Logic to delete a specific resource
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
