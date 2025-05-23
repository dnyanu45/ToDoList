<head>
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('DISPLAY TASK') }}
        </h2>
    </x-slot>

        <div class="justify-content-center">
            <div class="text-center mt-20 fs-2 fw-bold">
                <h2>My Task List</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-gray bg-green-300 px-4 py-3 fs-5 rounded mt-4 mb-4 w-100 mx-auto text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="m-5">
                @foreach($groupedTask as $date => $dayTasks)
    @php
        $taskDate = \Carbon\Carbon::parse($date);
    @endphp

    <h4 class="mt-4">
        @if($taskDate->isToday())
            📅 Today – {{ $taskDate->format('F j, Y') }} <br>
        @elseif($taskDate->isTomorrow())
            📅 Tomorrow – {{ $taskDate->format('F j, Y') }}<br>
        @else
            📅 {{ $taskDate->format('F j, Y (l)') }}<br>
        @endif
    </h4>
<br>
<div class="overflow-x-auto w-full">
    <table class="table table-striped px-3">
        <thead class="fs-6">
            <tr>
                <th>#</th>
                <th style="width: 270px;">Task Name</th>
                <th style="width: 350px;">Task Description</th>
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
            @foreach($dayTasks as $t)
                <tr>
                    <th>{{ $t->id }}</th>
                    <td>{{ $t->taskname }}</td>
                    <td>{{ $t->taskdesc }}</td>
                    <td>{{ $t->taskdate }}</td>
                    <td>{{ $t->timeto }}</td>
                    <td>{{ $t->timetill }}</td>
                    <td>{{ $t->created_at }}</td>
                    <td>
                        @php
                            $priority = $t->priority;
                            $badgeClass = match ($priority){
                                'high' => 'bg-danger text-white', // 'bg-success-subtle text-success-emphasis', light green
                                'medium' => 'bg-primary text-white',
                                'low' => 'bg-success text-white'
                            };
                        @endphp
                        <span class="badge text-dark fw-bold fs-6 {{$badgeClass}}" >
                            {{ ucfirst(str_replace('_',' ',$priority)) }}
                        </span>
                    </td>

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
        </tbody>
    </table>
</div>
@endforeach

            </div>

            <div class="flex justify-center  m4">
                <div class="shadow-sd bg-white-100 rounded-lg border p-4">
                   {{ $task->links() }}
                 </div>
            </div>

        </div>

        {{-- <p>Now: {{ \Carbon\Carbon::now() }}</p>
<p>Task Date: {{ $taskDate }}</p> --}}

</x-app-layout>