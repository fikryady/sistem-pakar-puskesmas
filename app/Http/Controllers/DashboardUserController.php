<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            "users" => User::orderby('id', 'asc')->filter(request(['search', 'users']))->paginate(8)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'tgl_lahir' => 'required|date',
        'no_hp' => 'required',
        'alamat' => 'required',
        'pekerjaan' => 'required',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',
    ]);

    // $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    return redirect('/dashboard/users')->with('success', 'New user has been added');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404); // Jika user tidak ditemukan, tampilkan error 404
        }
    
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username)
    {
        $rules = [
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255'],
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('username', $username)
            ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'User has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'User has been deleted');
    }
}
