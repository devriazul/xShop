@extends('layouts.app')

@section('content')
    <h1>Customer Details</h1>
    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Contact Number:</strong> {{ $customer->contact_number }}</p>
    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to List</a>
@endsection
