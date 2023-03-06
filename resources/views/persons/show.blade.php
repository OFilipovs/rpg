<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RPG - {{ $person->first_name }} {{ $person->last_name }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: row;
            overflow: hidden;
        }

        .left-column {
            background-color: #f5f5f5;
            padding: 20px;
            flex: 1;
        }

        .right-column {
            padding: 20px;
            flex: 2;
        }

        h1 {
            margin-top: 0;
        }

        .label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .value {
            margin-bottom: 10px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body class="antialiased">

<div class="container">
    <div class="left-column">
        <div class="label">ID:</div>
        <div class="label">First name:</div>
        <div class="label">Last name:</div>
        <div class="label">Personal ID number:</div>
        <div class="label">Type:</div>
    </div>
    <div class="right-column">
        <div class="value">{{ $person->id }}</div>
        <div class="value">{{ $person->first_name }}</div>
        <div class="value">{{ $person->last_name }}</div>
        <div class="value">{{ $person->personal_id_number }}</div>
        <div class="value">{{ $person->type }}</div>
        <div class="buttons">
            <a href="/persons/{{ $person->id }}/edit"><button>Edit</button></a>
            <form action="/persons/{{ $person->id }}" method="post">
                @csrf
                @method('delete')
                <button onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
