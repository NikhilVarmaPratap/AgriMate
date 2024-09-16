<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'num' => 'required|digits:10|unique:contacts,num',
        ]);

        Contact::create(['num' => $request->num]);

        return redirect()->route('contacts.index')->with('success', 'Contact number added successfully!');
    }
}
