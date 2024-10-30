<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="post" action="{{ route('task.update', $task->id) }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                        autofocus autocomplete="title" :value="old('title', $task->title)" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Desciption')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required
                        autocomplete="username" :value="old('description', $task->description)" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div>
                    <x-input-label for="completed" :value="__('Completed')" />
                    <select name="completed" class="mt-1 block w-full">
                        <option value="Chưa hoàn thành" {{ $task->completed == 'Chưa hoàn thành' ? 'selected' : '' }}>
                            Chưa hoàn thành</option>
                        <option value="Hoàn thành" {{ $task->completed == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành
                        </option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
