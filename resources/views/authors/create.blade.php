@extends('layouts.app')

@section('content')
<div class="w-2/3 bg-green-50 mx-auto pb-4 shadow-md">
    <form action="/authors" method="post" class="flex flex-col items-center">
        @csrf
        <h1>Add New Author</h1>
        <div class="pt-4">
            <input  class="rounded px-4 py-2 w-64" type="text" name="name" placeholder="Full Name">
            {{--@if ($errors->has('name'))
                <p class="text-red-600">{{ $errors->first('name') }}</p>
            @endif--}}
            @error('name') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="pt-4">
            <input  class="rounded px-4 py-2 w-64" type="text" name="dob" placeholder="Date of Birth">
            {{--@if ($errors->has('dob'))
                <p class="text-red-600">{{ $errors->first('dob') }}</p>
            @endif--}}
            @error('dob') <p class="text-red-600">{{ $message }}</p> @enderror

        </div>
        <div class="pt-4">
            <button class="bg-blue-400 text-white rounded py-2 px-4">Add New Author</button>
        </div>
    </form>
</div>
@endsection
