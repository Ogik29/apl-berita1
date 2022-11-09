@extends('dashboard.layout.mainDashboard')

@section('content')
    
    <h2 class="text-center text-danger">Welcome to Dashboard, {{ auth()->user()->name }}</h2>

@endsection