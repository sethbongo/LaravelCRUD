@extends('layouts.main-layout')

@section('title', 'ToDo Lists')

    @section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/todopage.css') }}">

    {{-- @vite('resources/css/todopage.css') --}}
    
    @endsection


@section('content')

   <div class="outer_div_tasks">
        <div class="inner_div">
            <h1>My To-Do List</h1>
        </div>

        <div class="task-form">
            <h2>{{ isset($editTask) ? 'Update Task' : 'Add New Task' }}</h2>
            <form action="{{ isset($editTask) ? route('updateTask', $editTask->id) : route('saveTasks') }}" method="POST">
                @csrf

                @if(isset($editTask))
                    @method('PUT')
                @endif

                <div class="div_tasks">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required placeholder="Enter title" value="{{ old('title', $editTask->title ?? '') }}">
                    @error('title')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="div_tasks">
                    <label for="tasks">Tasks </label>
                    <textarea id="tasks" name="tasks" required placeholder="Enter tasks to do">{{ old('tasks', $editTask->tasks ?? '') }}</textarea>
                    @error('tasks')
                    <p style="color:red">{{ $message }}</p>
                    @enderror                
                </div>

                <div class="div_tasks">
                    <label for="date_to_do">Due Date</label>
                    <input type="date" id="date_to_do" name="date_to_do" required value="{{ old('date_to_do', isset($editTask) ? $editTask->date_to_do : '') }}">
                    @error('date_to_do')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="add-btn">{{ isset($editTask) ? 'Update Task' : 'Add Task' }}</button>
                
                @if(isset($editTask))
                    <a href="{{ route('welcome') }}" class="cancel-btn">Cancel</a>
                @endif
            </form>
        </div>

        <div class="tasks_display">
            <h2>Your Tasks</h2>
            @forelse($tasks ?? [] as $task)
                <div class="task-item">
                    <h3>{{ $task->title }}</h3>
                    <p>{{ $task->tasks }}</p>
                    <p class="task-date">Due: {{ $task->date_to_do }}</p>
                    <div class="task-actions">
                        <form action="{{ route('editTask', $task->id) }}" method="GET" style="display: inline;">
                            <button type="submit" class="updatebutton">Update</button>
                        </form>

                        <form action="{{ route('deletepost',$task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deletebutton" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="color: #666;">No tasks yet. Add your first task above!</p>
            @endforelse
        </div>
    </div>
@endsection 