@extends('dashboard.master')

@section('title', 'Dashboard')

@section('page_title', 'Dashboard Home')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-4 bg-white rounded shadow">Card 1</div>
        <div class="p-4 bg-white rounded shadow">Card 2</div>
        <div class="p-4 bg-white rounded shadow">Card 3</div>
    </div>
@endsection

@section('page_level_scripts')
    <script>
        console.log('Dashboard page loaded');
    </script>
@endsection
