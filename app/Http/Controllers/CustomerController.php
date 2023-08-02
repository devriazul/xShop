<?php

// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\PromotionalEmail;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    // Show the list of customers
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Show the form to create a new customer
    public function create()
    {
        return view('customers.create');
    }

    // Store a new customer in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'contact_number' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    // Show the details of a customer
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Show the form to edit a customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Update a customer in the database
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'contact_number' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    // Delete a customer from the database
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
    public function sendPromotionalEmail(Customer $customer)
    {
        $data = [
            'name' => $customer->name,
            // Add other data you want to pass to the PromotionalEmail Mailable
        ];

        Mail::to($customer->email)->send(new PromotionalEmail($data));

        return redirect()->route('customers.index')
            ->with('success', 'Promotional email sent to the customer.');
    }
}

