<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index()
    {
        $users = AdminUser::latest()->get();
        return view('admin.team.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                       => 'required|string|max:100',
            'email'                      => 'required|email|unique:admin_users,email',
            'password'                   => 'required|string|min:8',
            'role'                       => 'required|in:admin,sender',
            'whatsapp_phone_number_id'   => 'nullable|string|max:50',
        ]);

        AdminUser::create([
            'name'                     => $request->name,
            'email'                    => $request->email,
            'password'                 => Hash::make($request->password),
            'role'                     => $request->role,
            'whatsapp_phone_number_id' => $request->whatsapp_phone_number_id ?: null,
        ]);

        return back()->with('success', "Teammate \"{$request->name}\" added successfully.");
    }

    public function update(Request $request, AdminUser $user)
    {
        $request->validate([
            'whatsapp_phone_number_id' => 'nullable|string|max:50',
        ]);

        $user->update([
            'whatsapp_phone_number_id' => $request->whatsapp_phone_number_id ?: null,
        ]);

        return back()->with('success', "WhatsApp number updated for \"{$user->name}\".");
    }

    public function destroy(AdminUser $user)
    {
        if ($user->id === session('admin_user_id')) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return back()->with('success', 'Teammate removed.');
    }
}
