@extends('layouts.app')

@section('content')
    <h1>Customer List</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add New Customer</a>

    @if ($customers->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->contact_number }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No customers found.</p>
    @endif
@endsection
