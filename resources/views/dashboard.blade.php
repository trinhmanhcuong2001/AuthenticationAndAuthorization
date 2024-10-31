<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="py-12">
                        <ul>
                            @can('create', \App\Models\Post::class)
                                <li class="p-6 "><a class="text-primary" href="{{ route('post.create') }}">Tạo một bài
                                        đăng</a></li>
                            @endcan
                            <li class="p-6 "><a class="text-primary" href="{{ route('post.index') }}">Danh sách bài
                                    đăng</a></li>
                        </ul>
                    </div>



                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $('#mltislct').multiselect();
        });
    </script> --}}
</x-app-layout>
