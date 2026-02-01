@extends('layouts.main-layout')

@section('title', 'ToDo Lists')

    @push('styles')
    <style>

        .todo-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        .todo-header h1 {
            font-size: 2.5rem;
            color: #000000;
            margin-bottom: 0.5rem;
        }

        .task-form {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .task-form h2 {
            color: #000000;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #000000;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #000000;
            border-radius: 5px;
            font-size: 1rem;
        }

     
        .add-btn {
            background-color: white;
            color: rgb(0, 0, 0);
            border: 1.5px #000000 solid;
            padding: 0.75rem 2rem;
            margin-top: 15px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .add-btn:hover {
            background-color: #bebaba;
        }

        .cancel-btn {
            background-color: white;
            color: rgb(0, 0, 0);
            border: 1.5px #000000 solid;
            padding: 0.75rem 2rem;
            margin-top: 15px;
            margin-left: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .cancel-btn:hover {
            background-color: #bebaba;

        }

        .tasks-list {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .tasks-list h2 {
            color: #000000;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .task-item {
            background-color: white;
            border: 2px solid #000000;
            border-radius: 5px;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .task-item h3 {
            color: #000000;
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }

        .task-item p {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .task-date {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .task-actions {
            display: flex;
            gap: 0.5rem;
        }

        .update-btn, .delete-btn {
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            border: 1.5px solid #000000;
        }

        .update-btn {
            background-color: white;
            color: #000000;
        }

        .update-btn:hover {
            background-color: #bebaba;
        }

        .delete-btn {
            background-color: white;
            color: #000000;
        }

        .delete-btn:hover {
            background-color: #bebaba;
        }
       
    </style>
    @endpush


@section('content')

   <div class="todo-container">
        <div class="todo-header">
            <h1>My To-Do List</h1>
        </div>

        <div class="task-form">
            <h2>{{ isset($editTask) ? 'Update Task' : 'Add New Task' }}</h2>
            <form action="{{ isset($editTask) ? route('updateTask', $editTask->id) : route('saveTasks') }}" method="POST">
                @csrf
                @if(isset($editTask))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required placeholder="Enter title" value="{{ old('title', $editTask->title ?? '') }}">
                    @error('title')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tasks">Tasks </label>
                    <textarea id="tasks" name="tasks" required placeholder="Enter tasks to do">{{ old('tasks', $editTask->tasks ?? '') }}</textarea>
                    @error('tasks')
                    <p style="color:red">{{ $message }}</p>
                    @enderror                
                </div>

                <div class="form-group">
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

        <div class="tasks-list">
            <h2>Your Tasks</h2>
            @forelse($tasks ?? [] as $task)
                <div class="task-item">
                    <h3>{{ $task->title }}</h3>
                    <p>{{ $task->tasks }}</p>
                    <p class="task-date">Due: {{ \Carbon\Carbon::parse($task->date_to_do)->format('M d, Y') }}</p>
                    <div class="task-actions">
                        <form action="{{ route('editTask', $task->id) }}" method="GET" style="display: inline;">
                            <button type="submit" class="update-btn">Update</button>
                        </form>

                        <form action="{{ route('deletepost',$task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="color: #666;">No tasks yet. Add your first task above!</p>
            @endforelse
        </div>
    </div>
@endsection 