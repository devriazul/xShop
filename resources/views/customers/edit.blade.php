@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="form-control"
                value="{{ $customer->contact_number }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
