<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersPurchasesController extends Controller
{
    
    public function index(Request $request ){
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('id', $search);
            });
        }

        $users = $query->paginate(5)->withQueryString(); // Keep search in pagination links

      
            return view("pages.user.purchasesCouses.userPurchases",compact("users"));

        
    }
}
