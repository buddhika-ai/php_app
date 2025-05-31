<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Import Rule
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    private function getAssignableRoles(): array
    {
        return [
            User::ROLE_MANAGER,
            User::ROLE_COORDINATOR,
            User::ROLE_VET_DOCTOR,
            User::ROLE_SUPERVISOR,
            User::ROLE_FARM_SALE_OPERATOR,
            User::ROLE_CUSTOMER, // Dean can also create customers if needed
        ];
    }

    public function create()
    {
        return view('admin.users.create', ['assignableRoles' => $this->getAssignableRoles()]);
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->paginate(10); // Example: Get all users, paginated
        return view('admin.users.index', compact('users'));
    }


    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $assignableRoles = $this->getAssignableRoles();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', Rule::in($assignableRoles)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Optionally, you can dispatch an event for a new user created by admin
        // event(new Registered($user));

        return redirect()->route('dashboard')->with('success', 'User created successfully.'); // Or redirect to a user list page
    }
}