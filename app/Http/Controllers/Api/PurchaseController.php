<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
      public function index()
    {
        $purchases = CoursePurchase::with(['user', 'course'])->get();
        return response()->json($purchases);
    }

    // POST: Store a new purchase
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'price' => 'required|numeric',
            'purchased_at' => 'required|date',
        ]);

        $purchase = CoursePurchase::create($validated);

        return response()->json($purchase, 201);
    }
}
