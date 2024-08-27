<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class FormController extends Controller
{
    // Method to display the identification form
    public function showForm()
    {
        return view('identification');
    }

    // Method to handle form submission
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'te_id' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'role' => 'required|in:Visitor,Contractor',
        ]);

        // Save form data to the database
        Visitor::create($validatedData);

        // Store the selected role in the session
        session(['role' => $request->input('role')]);

        // Redirect to the role selection page
        return redirect()->route('category.show');
    }

    // Method to display the category (role selection) page
    public function showCategory()
    {
        return view('category');
    }

    // Method to handle role selection
    public function chooseRole(Request $request)
    {
        $role = $request->input('role');

        if (!in_array($role, ['Visitor', 'Contractor'])) {
            return redirect()->back()->with('error', 'Invalid role selected.');
        }

        // Store the selected role in session
        session(['role' => $role]);

        // Redirect to the appropriate quiz page based on the role
        if ($role === 'Visitor') {
            return redirect()->route('visitor.quiz');
        } elseif ($role === 'Contractor') {
            return redirect()->route('contractor.quiz');
        }
    }
}
