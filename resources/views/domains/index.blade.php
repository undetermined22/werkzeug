<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Domains') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <a href="{{ route('domains.create') }}" class="bg-blue-600 text-white inline-block align-right py-1 px-4 m-3 rounded float-right">Create</a>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Domain Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Expiration Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($domains as $domain)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $domain->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $domain->expiration_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $domain->description ?? '_' }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('domains.edit', $domain) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="4" class="px-6 py-4 text-center">
                                        There's no domains yet
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-3">
                    {{ $domains->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
