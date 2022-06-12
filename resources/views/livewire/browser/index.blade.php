<div class="p-5">
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-5 rounded mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="grid grid-cols-6 gap-6 py-3">
        <div class="col-span-6 sm:col-span-4">
            <p class="py-2">Path: /{{ $path }}</p>
        </div>
        <div class="col-span-6 sm:col-span-2">
            <button wire:click="upload()" class="float-right bg-blue-600 text-white inline-block py-1 px-4 rounded">Upload</button>
        </div>
        <div class="col-span-6">
            <input type="search" placeholder="Search" wire:keydown.enter="filter" wire:model.defer="search" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filteredDirectories as $directory)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <button wire:click="cd('{{ $directory }}')" class="text-blue-600 dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                            </svg>
                            {{ Str::afterLast($directory, '/') }}
                        </button>
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{-- <a href="{{ route('files.edit', $file) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                    </td>
                </tr>
            @endforeach
            @foreach ($files as $file)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline">{{ Str::afterLast($file, '/') }}</a>
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{-- <a href="{{ route('files.edit', $file) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
