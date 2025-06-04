@extends('layouts.main')

@section('container')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-xl font-bold mb-4">Lupa Password</h2>

    @if (session('status'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Kirim Link Reset
        </button>
    </form>
</div>
@endsection
