<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(3);

        if ($request->ajax()) {
            return view('pages.user.listAllUser', compact('users'))->renderSections()['contents'];
        }
        return view('pages.user.listAllUser', compact('users'));
    }
    public function search(Request $request)
    {

        $query = User::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request['search'] . '%')
                ->orWhere('email', 'like', '%' . $request['search'] . '%');
        }

        $users = $query->get();

        if ($request->ajax()) {
            return view('components.partials.userRows', compact('users'))->render();
        }

        return view('components.partials.userRows', compact('users'));
    }

    public function view($id){
        $users=User::with('purchases.course')->findOrFail($id);
        return response()->json($users
    );
    }



}
