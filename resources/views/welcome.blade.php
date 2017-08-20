

@extends('layouts.app')

@section('content')


    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                TASK LIST
            </div>

            <div class="links">
                <a href="{{ url('/tasks') }}">View ALl Tasks</a>
                <a href="{{ url('/task/create') }}">Create New Task</a>
            </div>
        </div>
    </div>
@endsection
