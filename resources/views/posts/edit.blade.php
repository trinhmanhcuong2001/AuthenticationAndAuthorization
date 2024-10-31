<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('post.update', $post->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autofocus
                            autocomplete="title" :value="$post->title" />

                    </div>

                    <div>
                        <x-input-label for="content" :value="__('Content')" />
                        <x-text-input id="content" name="content" type="text" class="mt-1 block w-full" required
                            autocomplete="username" :value="$post->content" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
