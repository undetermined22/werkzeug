<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repositories') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="">
                    <form action="{{ route('repositories.update', $repository) }}" method="POST">
                        <div class="overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="mb-10">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Edit repository</h3>
                                    @csrf
                                    @method('PUT')
                                </div>
                                @if ($errors->any())
                                    <div class="bg-red-100 text-red-600 p-5 rounded mb-5">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Repository name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') ?? $repository->name }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="key" class="block text-sm font-medium text-gray-700">Repository key</label>
                                        <input type="text" name="key" value="{{ old('key') ?? $repository->key }}" id="organization" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="organization" class="block text-sm font-medium text-gray-700">Organization Name</label>
                                        <input type="text" name="organization" value="{{ old('organization') ?? $repository->organization }}" id="organization" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="url" class="block text-sm font-medium text-gray-700">Repository Url</label>
                                        <input type="text" name="url" value="{{ old('url') ?? $repository->url }}" id="url" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-gray-400">(optional)</span></label>
                                        <textarea name="description" id="description" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description') ?? $repository->description }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
