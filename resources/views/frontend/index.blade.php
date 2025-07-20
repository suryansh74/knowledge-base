@extends('layouts.app') {{-- assuming you have a base layout --}}

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <x-problem-list :problems="$problems" />
    </div>
@endsection