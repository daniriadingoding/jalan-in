<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    /**
     * Display the user management page.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalOperators = User::where('role', 'operator')->count();

        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users.index', compact('totalUsers', 'totalAdmins', 'totalOperators', 'users'));
    }

    /**
     * Show the form for creating a new operator.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created operator.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'region' => ['nullable', 'string', 'max:255'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'operator',
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Operator berhasil ditambahkan.');
    }
}
