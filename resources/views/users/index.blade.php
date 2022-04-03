@extends('layouts.app')

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-users mr-3"></i> Usuários
        </p>
        <div class="mb-2">
            <a href="{{ route('addUsers')  }}" class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded" type="submit">Novo</a>
        </div>
        <div class="bg-white overflow-auto">
            @if($users)
            <table class="min-w-full bg-white">
                <thead class="bg-red-500 text-white">
                <tr>
                    <th class="w-1/7 text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">GitHub</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">Permissão</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($users as $key => $user)
                    <tr @if($key % 2) class="bg-gray-200" @endif>
                        <td class="w-1/7 text-left py-3 px-4"><img class="w-14 rounded-full" src="{{ $user->avatar_url }}"></td>
                        <td class="w-2/7 text-left py-3 px-4">{{ $user->name }}</td>
                        <td class="w-2/7 text-left py-3 px-4">{{ $user->email }}</td>
                        <td class="w-2/7 text-left py-3 px-4">{{ $user->github_url }}</td>
                        <td class="w-2/7 text-left py-3 px-4">{{ $user->admin === true ? 'Administrador' : 'Usuário padrão' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @else
                    <p class="text-xl pb-3">Nenhum usuário encontrado</p>
                @endif
        </div>
    </div>
@endsection
