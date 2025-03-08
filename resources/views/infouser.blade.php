<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(Auth::user()->rol == 'admin')
                        <h3 class="text-lg font-semibold mb-4">{{ __('All Users') }}</h3>
                        
                        <!-- Tabla de usuarios -->
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">{{ __('ID') }}</th>
                                    <th class="px-4 py-2 border-b">{{ __('Name') }}</th>
                                    <th class="px-4 py-2 border-b">{{ __('Surname') }}</th>
                                    <th class="px-4 py-2 border-b">{{ __('Date of Birth') }}</th>
                                    <th class="px-4 py-2 border-b">{{ __('Email') }}</th>
                                    <th class="px-4 py-2 border-b">{{ __('Role') }}</th>
                                    <th class="px-4 py-2 border-b">{{ __('Created At') }}</th>
                                </tr>
                            </thead>
                            @if(isset($users) && $users->count() > 0)
                            <tbody>  
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                                        <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                        <td class="px-4 py-2 border-b">{{ $user->surname }}</td>
                                        <td class="px-4 py-2 border-b">{{ $user->birth_date->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                        <td class="px-4 py-2 border-b">{{ $user->rol }}</td>
                                        <td class="px-4 py-2 border-b">{{ $user->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    @else
                        <!-- Banner para usuarios invitados -->
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 p-4 rounded-md mb-4">
                            <strong>{{ __('You are a guest user!') }}</strong>
                        </div>

                        <div>
                            <p><strong>{{ __('Name:') }}</strong> {{ Auth::user()->name }}</p>
                            <p><strong>{{ __('Surname:') }}</strong> {{ Auth::user()->surname }}</p>
                            <p><strong>{{ __('Birth Date:') }}</strong> {{ Auth::user()->birth_date ? Auth::user()->birth_date->format('d/m/Y') : 'Not set' }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
