@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-users mr-3"></i> Usuários do Github
        </p>
        <div class="bg-white overflow-auto">
            @if($users)
            <table class="min-w-full bg-white">
                <thead class="bg-red-500 text-white">
                <tr>
                    <th class="w-1/7 text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">Usuário</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">URL</th>
                    <th class="w-2/7 text-left py-3 px-4 uppercase font-semibold text-sm">Tipo</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($users as $key => $user)
                    <tr @if ($key % 2) class="bg-gray-200" @endif>
                        <td class="w-1/7 text-left py-3 px-4"><img class="w-14 rounded-full" src="{{ $user->avatar_url }}"></td>
                        <td class="w-2/7 text-left py-3 px-4">{{ $user->login }}</td>
                        <td class="w-2/7 text-left py-3 px-4">{{ $user->html_url }}</td>
                        <td class="w-2/7 text-left py-3 px-4"><a class="hover:text-blue-500">{{ $user->type }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row xs:justify-between">
                {{ $users->links('pagination::tailwind') }}
            </div>

            @else
                <p class="text-xl pb-3">Nenhum usuário encontrado</p>
            @endif
        </div>
    </div>
@endsection
