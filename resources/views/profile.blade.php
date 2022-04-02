@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('profileUpdate') }}">
        @csrf
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/1 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-user mr-3"></i> Perfil
                </p>
                <div class="leading-loose">
                    <form class="p-10 bg-white rounded shadow-xl">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Nome</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" value="{{ $user->name }}" required="" placeholder="Your Name" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" value="{{ $user->email }}" required="" placeholder="Your Email" aria-label="Email">
                        </div>
                        <div class="mt-6">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection
