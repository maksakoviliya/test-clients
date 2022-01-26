@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <form action="{{ route('update', $client->id) }}" method="POST">
                        @csrf
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 relative">
                                    <x-text-input label="Имя" value="{{ old('name') ?? $client->name }}" name="name"></x-text-input>
                                </div>
                                <div class="col-span-6">
                                    <x-select-input label="Менеджер" value="{{ old('manager_id') ?? $client->manager->id }}" name="manager_id" :options="$managers"></x-select-input>
                                </div>
                                <div class="col-span-6">
                                    <x-text-input label="Тэги" value="{{ old('tags') ?? implode(',', $client->tags)  }}" name="tags"></x-text-input>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-end w-full gap-4 items-center">
{{--                            @if(Session::has('message'))--}}
                                <p class="mr-auto text-xs text-green-600">{{ Session::get('message') }}</p>
{{--                            @endif--}}
                            <modal-delete-confirmation :client="{{ $client }}"></modal-delete-confirmation>
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
