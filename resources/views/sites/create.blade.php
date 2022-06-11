<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sites') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="">
                    <form action="{{ route('sites.store') }}" method="POST">
                        <div class="overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="mb-10">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Create new site</h3>
                                    @csrf
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
                                    <div class="col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Site's name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="server-id" class="block text-sm font-medium text-gray-700">Server</label>
                                        <select id="server-id" name="server_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value=""></option>
                                            @foreach ($servers as $server)
                                                <option value="{{ $server->id }}" @selected(old('server_id') == $server->id)>{{ $server->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="domain-id" class="block text-sm font-medium text-gray-700">Domain</label>
                                        <select id="domain-id" name="domain_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value=""></option>
                                            @foreach ($domains as $domain)
                                                <option value="{{ $domain->id }}" @selected(old('domain_id') == $domain->id)>{{ $domain->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" value="{{ old('description') }}" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
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
