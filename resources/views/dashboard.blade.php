<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <nav class="nav flex-column">
                        <a class="nav-link" aria-current="page" href="{{ route('task.create') }}">Tạo công việc</a>
                        <a class="nav-link" href="{{ route('task.index') }}">Danh sách công việc</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
