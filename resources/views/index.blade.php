@extends('layouts.app')

@section('content')
    <form action="{{ route('index') }}" method="GET"
          class="p-4 rounded-lg bg-gray-50 shadow w-full flex items-end gap-4">
        <div class="col-span-6 sm:col-span-3 w-full">
            <label for="query" class="block text-sm font-medium text-gray-700">Поиск клиентов</label>
            <input type="text" name="search" id="query" autocomplete="query" value="{{ request()->get('search') }}"
                   class="mt-1 px-4 shadow py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Поиск
        </button>
    </form>
    <div class="flex flex-col mt-4">
        <div class="-my-2 sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow border-b border-gray-200 sm:rounded-lg overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">
                                <x-table-header-button label="##" name="id"></x-table-header-button>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">
                                <x-table-header-button label="Имя" name="name"></x-table-header-button>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <x-table-header-button label="Менеджер" name="manager_id"></x-table-header-button>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">
                                Тэги
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <x-table-header-button label="Дата изменения" name="updated_at"></x-table-header-button>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                        @forelse($clients as $client)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-600 text-xs">{{ $client->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $client->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $client->manager->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $client->manager->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($client->tags as $tag)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-green-800">
                                      {{ $tag }}
                                    </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $client->updated_at->format('d.m.Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('edit', $client->id) }}"
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    Поиск не дал результатов
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50">
                        <tr>
                            <th colspan="6" scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                {{ $clients->links() }}
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
