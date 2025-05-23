<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADD TASK') }}
        </h2>
    </x-slot>

    <div class="text-center justify-center mt-5">
        <div class="fs-2">
            <h1>Add New Task</h1>
        </div>

        {{-- Error Message Box --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 w-50 mx-auto mt-4">
                <strong>Whoops!</strong> There were some problems with your input:
                <ul class="mt-2 list-disc list-inside text-left">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-center mt-5">
            <div class="border border-2 p-4 w-50">
                <form action="{{ route('edit-task', $task->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    {{-- Task Name --}}
                    <label for="">Task Name:</label>
                    <input type="text" value="{{ old('taskname', $task->taskname) }}" name="taskname" class="form-control mt-2 text-center">
                    @error('taskname')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    {{-- Task Description --}}
                    <label class="mt-4" for="">Task Description:</label>
                    <textarea name="taskdesc" class="form-control mt-2 text-center">{{ old('taskdesc', $task->taskdesc) }}</textarea>
                    @error('taskdesc')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    {{-- Task Date --}}
                    <label class="mt-4" for="">Task Date:</label>
                    <input type="date" value="{{ old('taskdate', $task->taskdate) }}" name="taskdate" class="form-control mt-2 text-center">
                    @error('taskdate')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    {{-- Time To --}}
                    <label class="mt-4" for="">Time To:</label>
                    <input type="time" value="{{ old('timeto', $task->timeto) }}" name="timeto" class="form-control mt-2 text-center">
                    @error('timeto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    {{-- Time Till --}}
                    <label class="mt-4" for="">Time Till:</label>
                    <input type="time" value="{{ old('timetill', $task->timetill) }}" name="timetill" class="form-control mt-2 text-center">
                    @error('timetill')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <label class="mt-4" for="">Status:</label>
                    <select name="status" class="form-control">
                    <option value="pending"{{old('status', $task->status)=== 'pending' ? 'selected' : ''}}>Pending</option>
                    <option value="in_progress"{{old('status', $task->status) === 'n_progress' ? 'selected' : ''}}>In Progress</option>
                    <option value="completed"{{old('status', $task->status)=== 'completed' ? 'selected' : ''}}>Completed</option>
                    </select>
                    @error('status')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                    
                    <label class="mt-4" for="">Priority:</label>
                    <select name="priority" class="form-control">
                    <option value="high"{{old('priority', $task->priority)=== 'high' ? 'selected' : ''}}>High</option>
                    <option value="medium"{{old('priority', $task->priority) === 'medium' ? 'selected' : ''}}>Meduim</option>
                    <option value="low"{{old('priority', $task->priority)=== 'low' ? 'selected' : ''}}>Low</option>
                    </select>
                    @error('status')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror

                    <button class="form-control btn btn-primary mt-4">Update Task</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
