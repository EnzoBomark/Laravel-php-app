@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white px-10 py-5 rounded-xl w-4/5 max-w-4xl">
            <x-post :post="$post" />
        </div>
    </div>
@endsection
