<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3">
                    <h1 class="leading-10 font-bold">Latest Deployments</h1>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Repository Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Environment Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Branch Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-right">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deployments as $deployment)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $deployment->repository->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $deployment->environment->name }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $deployment->branch }}
                                </th>
                                <td class="px-6 py-4 text-right">
                                    {{ $deployment->created_at->diffForHumans(); }}
                                </td>
                            </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="4" class="px-6 py-4 text-center">
                                        There's no deployment
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
