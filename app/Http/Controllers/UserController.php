<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function toggleStatus(User $user)
    {
        $isActive['verified'] = request()->input('isActive');
        
        User::where('id', $user->id)->update($isActive);

        return response()->json(['message' => 'Status updated successfully']);
    }
    public function index()
    {
        // $asd = User::find(1);
        // dd($asd->getRoleNames());
        return view('auth.users', [
            'users' => User::with('roles')->get(),
        ]);
    }
}
