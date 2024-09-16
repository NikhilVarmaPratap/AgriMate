<?php
namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    public function index()
    {
        $retailers = Retailer::all();
        return view('retailers.index', compact('retailers'));
    }

    public function create()
    {
        return view('retailers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'r_name' => 'required|string|max:255',
            'phone' => 'required|digits:10|unique:retailers,phone',
            'region' => 'required|string|max:255',
        ]);

        Retailer::create($request->all());

        return redirect()->route('retailers.index')->with('success', 'Retailer added successfully!');
    }
}
