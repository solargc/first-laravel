@extends('layouts.app')

@section('title', 'Todos')

@section('content')
    <h1>Todos</h1>

    @if (count($todos) === 0)
        <p>No todos yet.</p>
    @else
        <ul>
            @foreach ($todos as $todo)
                <li>
                    @if ($todo['done'])
                        <s>{{ $todo['title'] }}</s>
                    @else
                        {{ $todo['title'] }}
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/todos">
        @csrf

        <input
            type="text"
            name="title"
            placeholder="New todo"
        >

        <button type="submit">Add</button>
    </form>
@endsection
