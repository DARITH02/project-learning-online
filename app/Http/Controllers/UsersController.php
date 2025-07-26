<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('id', $search);
            });
        }

        $users = $query->paginate(3)->withQueryString(); // Keep search in pagination links

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
            return view('pages.user.listAllUser', compact('users'))->render();
        }

        return view('pages.user.listAllUser', compact('users'));
    }

    public function view($id)
    {
        $users = User::with('purchases.course')->findOrFail($id);
        return response()->json(
            $users
        );
    }
    public function add(Request $request)
    {
        dd($request->all());
    }
}
