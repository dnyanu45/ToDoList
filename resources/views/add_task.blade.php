
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADD TASK') }}
        </h2>
    </x-slot>

    <div class="text-center justify-center mt-5">
        <div class="fs-2">
             <h1 >Add New Task</h1>
        </div>
       
    <div class="d-flex justify-content-center mt-5 ">
        <div class="border border-2 p-4 w-50 ">
            <form action="{{ Route('store-task') }}" method="post">
                @csrf

            <label for="">User Id:</label>
            <input type="number"  name="user_id" value="{{$userId}}" class="form-control mt-2 text-center @error('user_id') is-invalid @enderror" readonly>

            @error('user_id')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
            
            <label for="">Task Name:</label>
            <input type="text"  name="taskname" class="form-control mt-2 text-center @error('taskname') is-invalid @enderror">

            @error('taskname')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <label class="mt-4" for="">Task Description:</label>
            <textarea type="text" name="taskdesc" class="form-control mt-2 text-center  @error('taskdesc') is-invalid @enderror"> </textarea>
            @error('taskdesc')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <label class="mt-4" for="">Task Date:</label>
            <input type="date" name="taskdate" class="form-control mt-2 text-center  @error('taskdate') is-invalid @enderror">
            @error('taskdate')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <label class="mt-4" for="">Time To:</label>
            <input type="time" name="timeto" class="form-control mt-2 text-center  @error('timeto') is-invalid @enderror">
            @error('timeto')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <label class="mt-4" for="">Time Till:</label>
            <input type="time" name="timetill" class="form-control mt-2 text-center  @error('timetill') is-invalid @enderror">
            @error('timetill')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <label class="mt-4" for="">Status:</label>
            <select name="status" class="form-control" disabled>
            <option value="pending" >Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
            </select>
            <input type="hidden" name="status" value="pending">
            @error('status')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <label class="mt-4" for="">Priority:</label>
            <select name="priority" class="form-control">
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
            </select>
            @error('status')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror

            <button class="form-control btn btn-primary mt-4">Add Task</button>
            </form>
        </div>
    </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong>Whoops!</strong> There were some problems with your input:
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</x-app-layout>