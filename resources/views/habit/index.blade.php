<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Habits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-900">
                @include('habit.form')
                <div class="bg-gray-200 shadow rounded p-4 mt-4">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left border-b">
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($habit as $habit)
                                <tr class="border-b">
                                    <td class="mt-4">{{ $habit->name}}</td>
                                    <td class="mt-4">
                                        <form method="POST" action="{{ route('habit.destroy', $habit) }}"
                                        onsubmit="return confirm('Delete this expense?')">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="text-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>