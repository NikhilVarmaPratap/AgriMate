<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{
    protected $smsService;
    public function __construct(SMSService $smsService)
    {
        $this->smsService = $smsService;
    }
    public function index()
    {
        $farmers = Farmer::with('prods')->get();
        return view('farmers.index', compact('farmers'));
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:farmers',
            'phone' => 'required|digits:10',
            'password' => 'required|string|min:8',
        ]);

        Farmer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $this->smsService->sendSMS($farmer->phone, 'Welcome to the Farmer App!');

        return redirect()->route('farmers.index')->with('success', 'Farmer added successfully!');
    }
}
