@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Atenção!</strong>
            @foreach ($errors->all() as $error)
                <span class="block sm:inline"><li>{{$error}}</li></span>
            @endforeach
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    <form method="POST" action="{{ route('saveUser') }}">
        @csrf
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/1 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-user mr-3"></i> Adicionar novo usuário
                </p>
                <div class="leading-loose">
                    <form class="p-10 bg-white rounded shadow-xl">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="name">Nome</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" value="{{ @old('name') }}" required="" placeholder="Seu Nome" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="email">Email</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" value="{{ @old('email') }}" required="" placeholder="Seu Email" aria-label="Email">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="github_url">GitHub</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="github_url" name="github_url" type="text" value="{{ @old('github_url') }}" required="" placeholder="Seu GitHub" aria-label="GitHu">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password">Senha</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" value="{{ @old('password') }}" required="" placeholder="Sua Senha" aria-label="Senha">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password_confirm">Senha</label>
                            <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="password_confirm" name="password_confirm" type="password" value="{{ @old('password_confirm') }}" required="" placeholder="Sua Senha" aria-label="Senha">
                        </div>
                        <div class="mt-2">
                            <div class="md:w-1/3"></div>
                            <label class="block text-sm text-gray-600" for="email">Permissão</label>
                                <input class="mr-2 leading-tight" type="checkbox" name="admin" value="{{ old('name') }}">
                                <span class="text-sm text-gray-600">
                                    Admin
                                </span>
                            </label>
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
