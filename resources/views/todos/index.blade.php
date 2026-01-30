@extends('layouts.app')

@section('title', 'Todos')

@section('content')
    <div class="flex items-baseline justify-between gap-4">
        <h1 class="text-xl font-semibold tracking-tight">
            <span class="text-grey-700 dark:text-violet-300">Todos</span>
        </h1>

        <span class="text-sm text-gray-500 dark:text-gray-400">
            {{ $todos->count() }} item{{ $todos->count() === 1 ? '' : 's' }}
        </span>
    </div>

    <form method="POST" action="/todos" class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center">
        @csrf

        <input
            type="text"
            name="title"
            placeholder="New todo"
            value="{{ old('title') }}"
            class="w-full flex-1 rounded-lg border-3 border-gray-300 bg-white px-3 py-2 text-sm
                   placeholder:text-gray-400
                   focus:outline-none focus:border-violet-500/30
                   dark:border-gray-700 dark:bg-gray-950 dark:placeholder:text-gray-500
                   dark:focus:border-violet-400 dark:focus:ring-violet-400/25"
        >

        <button
            type="submit"
            class="inline-flex justify-center rounded-lg border-3 border-violet-100 bg-violet-100 px-4 py-2 text-sm font-medium
                   hover:border-orange-300
                   dark:border-gray-700 dark:bg-gray-900 dark:hover:bg-violet-900"
        >
            Add
        </button>
    </form>

    @if ($errors->any())
        <p class="mt-3 text-sm text-orange-700 dark:text-orange-300">
            {{ $errors->first() }}
        </p>
    @endif

    <ul class="mt-6 overflow-hidden rounded-lg border-3 border-violet-100/100 dark:border-violet-900/30">
        @forelse ($todos as $todo)
            <li
                class="
                    px-4 py-3 text-sm
                    {{ $loop->odd
                        ? 'bg-gray-50 dark:bg-gray-900'
                        : 'bg-violet-100/100 dark:bg-violet-900/30'
                    }}
                "
            >
                <span class="{{ $todo->done ? 'text-gray-400 line-through' : '' }}">
                    {{ $todo->title }}
                </span>
            </li>
        @empty
            <li class="px-4 py-8 text-sm text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-900">
                No todos yet.
            </li>
        @endforelse
    </ul>
@endsection
