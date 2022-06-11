<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repositories') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="mb-10">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Repository</h3>
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Repository name</label>
                                <p>{{ $repository->name }}</p>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="key" class="block text-sm font-medium text-gray-700">Repository key</label>
                                <p>{{ $repository->key }}</p>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="organization" class="block text-sm font-medium text-gray-700">Organization Name</label>
                                <p>{{ $repository->organization }}</p>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="url" class="block text-sm font-medium text-gray-700">Repository Url</label>
                                <p><a href="{{ $repository->url }}" class="text-blue-600" target="_blank">repository link</a></p>
                            </div>
                            
                            <div class="col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <p>{{ $repository->description ?? '-' }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="mb-10">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 float-left">Environments</h3>
                        <a href="{{ route('environments.create', $repository) }}" class="bg-blue-600 text-white inline-block align-right py-1 px-4 mx-3 rounded float-right">Add</a>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Environment Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Server Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($repository->environments as $environment)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $environment->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $environment->server ? $environment->server->name : '_' }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('environments.edit', [$repository, $environment]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
