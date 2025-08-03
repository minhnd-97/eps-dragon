<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    const PAGINATION_LIMIT = 10; // Set the page limit as a constant

    /**
     * Display a listing of users.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter by role
        if ($request->has('role') && $request->role != '') {
            $query->whereHas('roles', function ($query) use ($request) {
                $query->where('name', $request->role);
            });
        }

        // Filter by active status
        if ($request->has('status') && $request->status != '') {
            $query->where('is_active', $request->status);
        }

        // Search by name
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $users = $query->paginate(self::PAGINATION_LIMIT);

        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        // Determine allowed roles based on the current user's role.
        $allowedRoles = [];
        if (auth()->user()->hasRole('admin')) {
            $allowedRoles = ['admin', 'teacher', 'student'];
        } elseif (auth()->user()->hasRole('teacher')) {
            $allowedRoles = ['student'];
        }
        // Fetch the role records from DB.
        $roles = Role::whereIn('name', $allowedRoles)->get();

        return view('pages.admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // The request is already validated at this point.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Attach role
        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Admin can change role to any; teacher can only change to student.
        $allowedRoles = [];
        if (auth()->user()->hasRole('admin')) {
            $allowedRoles = ['admin', 'teacher', 'student'];
        } elseif (auth()->user()->hasRole('teacher')) {
            $allowedRoles = ['student'];
        }
        $roles = Role::whereIn('name', $allowedRoles)->get();

        return view('pages.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update roles: detach all then attach the new one.
        $user->roles()->detach();
        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Optionally, add a check so that a user cannot delete themselves.
        $user->delete();

        return redirect()->back()
            ->with('success', 'User deleted successfully.');
    }

    public function toggleActivation($userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);

        // Toggle the active status
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->back()
            ->with('success', $user->is_active
                ? "Đã kích hoạt tài khoản: {$user->email}"
                : "Đã vô hiệu hóa tài khoản: {$user->email}"
            );
    }
}
