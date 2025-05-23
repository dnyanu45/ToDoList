<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .bg-container {
            background: url('{{ asset("images/bg4.png") }}') no-repeat center center;
            background-size: cover;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            width: 100%;
            max-width: 1100px;
        }

        @media (min-width: 640px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .card-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            color: #fff;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card a {
            color: #fff;
            text-decoration: none;
        }

        .card a:hover {
            text-decoration: underline;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border-radius: 50px;
            display: inline-block;
            font-size: 0.9rem;
        }
    </style>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-container">
        <div class="card-grid">

            <div class="card">
                <h3><i class="fa-solid fa-plus-circle"></i> <a class="text-primary" href="{{ route('add-task') }}">Add New Task</a></h3>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-hourglass-half"></i> <a class="text-primary" href="{{ route('pending-task') }}">Pending Task</a></h3>
            </div>

            <div class="card">
                <h3>
                    <span class="badge-danger">
                        <i class="fa-solid fa-circle-exclamation me-1"></i>
                        <a  href="{{ route('high-priority-task') }}">High Priority Task</a>
                    </span>
                </h3>
            </div>

            <div class="card">
                <h3 ><i class="fa-solid fa-desktop"></i> <a class="text-primary" href="{{ route('display-task') }}">Display Task</a></h3>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-circle-info"></i> <a class="text-primary" href="{{ route('display-task') }}">About</a></h3>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-circle-question"></i> <a class="text-primary" href="{{ route('display-task') }}">Help</a></h3>
            </div>

        </div>
    </div>
</x-app-layout>
