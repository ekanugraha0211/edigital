@extends('layouts.main')

@section('container')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-xl font-bold mb-4">Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Password Baru</label>
            <input type="password" name="password" id="password" class="w-full border rounded p-2" required>
            @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Reset Password
        </button>
    </form>
</div>
@endsection
