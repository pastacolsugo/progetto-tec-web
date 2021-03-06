<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica profilo') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto bg-white rounded pb-8 my-4 border border-gray-200">
        <div class="my-0 mx-4 overflow-x-auto md:mx-0 xl:mx-8">
            <form action="{{ route('profile-edit-post') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mt-8 grid lg:grid-cols-2 gap-8 gap-x-16">
                    <div>
                        <label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Nome</label>
                        <input type="text" name="name" id="name" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $user->name }}" value="{{ $user->name }}" />
                    </div>

                    <div>
                        <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $user->email }}" value="{{ $user->email }}" />
                    </div>

                    <div>
                        <label for="isSeller" class="text-sm text-gray-700 block mb-1 font-medium">Venditore?</label>
                        <x-select id="isSeller" name="isSeller">
                            @if ($user->isSeller)
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            @else
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            @endif
                        </x-select>
                    </div>
                </div>
                <div class="flex justify-end space-x-4 mt-8">
                    <!-- Secondary -->
                    <button type="reset" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Ripristina</button>

                    <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Salva</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
