<?php
namespace App\Http\Controllers;

use App\Models\Prod;
use App\Models\Farmer;
use Illuminate\Http\Request;

class ProdController extends Controller
{
    public function index()
    {
        $prods = Prod::with('farmer')->get();
        return view('prods.index', compact('prods'));
    }

    public function create()
    {
        $farmers = Farmer::all();
        return view('prods.create', compact('farmers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_id' => 'required|exists:farmers,id',
            'product' => 'required|string|max:255',
            'market_val' => 'required|numeric',
        ]);

        Prod::create($request->all());

        return redirect()->route('prods.index')->with('success', 'Product added successfully!');
    }
}
