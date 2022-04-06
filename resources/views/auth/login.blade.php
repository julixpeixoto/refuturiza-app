@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <div class="flex justify-center">
                <img src="img/logo.png">
            </div>
            <form action="">
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">E-mail<label>
                                <input type="text" placeholder="E-mail"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('email')
                                <span class="text-xs tracking-wide text-red-600">{{ $message }}</span>
                                @enderror

                    </div>
                    <div class="mt-4">
                        <label class="block">Senha<label>
                                <input type="password" placeholder="Senha"
                                       name="password"
                                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('password')
                                <span class="text-xs tracking-wide text-red-600">{{ $message }}</span>
                                @enderror
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white bg-red-500 rounded-lg hover:bg-yellow-900">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</form>
@endsection
