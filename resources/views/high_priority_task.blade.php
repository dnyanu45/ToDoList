<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADD TASK') }}
        </h2>
    </x-slot>

    <div class="text-center justify-center mt-5">
        <div class="fs-2">
             <h1 >Pending Task</h1>
        </div><br><br>
        <div class="overflow-x-auto w-full">
    <table class="table table-striped px-3">
        <thead class="fs-6">
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Task Date</th>
                <th>Time To</th>
                <th>Time Till</th>
                <th>Created At</th>
                <th>Priority</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp; Status</th>
                <th style="width: 250px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($task->isEmpty())
                <td colspan="10" class="text-center  text-muted"><p class="p-2 fs-5">No tasks found.</p></td>
            @else
            @foreach($task as $t)
                <tr>
                    <th>{{ $t->id }}</th>
                    <td>{{ $t->taskname }}</td>
                    <td>{{ $t->taskdesc }}</td>
                    <td>{{ $t->taskdate }}</td>
                    <td>{{ $t->timeto }}</td>
                    <td>{{ $t->timetill }}</td>
                    <td>{{ $t->created_at }}</td>
                    <td ><span class="bg-danger rounded p-1 px-3 text-white">{{ $t->priority }}</span></td>
                    <td>
                        @php
                            $status = $t->status;
                            $badgeClass = match ($status){
                                'completed' => 'bg-success text-white', // 'bg-success-subtle text-success-emphasis', light green
                                'in_progress' => 'bg-primary text-white',
                                'pending' => 'bg-danger text-white'
                            };
                        @endphp
                        <span class="badge text-dark fw-bold fs-6 {{$badgeClass}}" >
                            {{ ucfirst(str_replace('_',' ',$status)) }}
                        </span>
                    </td>
                    <td class="d-flex gap-3">
                        <a class="btn btn-primary h-10" href="{{ route('edit-task-page', $t->id) }}">Edit</a>
                        <form action="{{ route('delete-task', $t->id) }}" method="POST" onsubmit="return confirm('Do you want to delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
        
    </div>
</x-app-layout>