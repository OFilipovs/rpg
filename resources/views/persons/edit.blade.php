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

        .input {
            margin-bottom: 10px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }

        .error-message {
            font-size: 0.8rem;
            color: red;
            margin-top: 0.2rem;
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
        <form action="{{  route('persons.update', $person) }}" method="post">
            @csrf
            @method('put')

            <div class="value">{{ $person->id }}</div>
            <div class="input">
                <input type="text" name="first_name" value="{{ $person->first_name }}">
                <x-input-error :messages="$errors->get('first_name')" class="error-message"/>
            </div>
            <div class="input">
                <input type="text" name="last_name" value="{{ $person->last_name }}">
                <x-input-error :messages="$errors->get('last_name')" class="error-message"/>
            </div>
            <div class="input">
                <input type="text" name="personal_id_number" value="{{ $person->personal_id_number }}">
                <x-input-error :messages="$errors->get('personal_id_number')" class="error-message"/>
            </div>
            <div class="input">
                <label id="type">
                    <select name="type">
                        <option value="physical"{{ $person->type === 'physical' ? ' selected' : '' }}>Physical</option>
                        <option value="legal"{{ $person->type === 'legal' ? ' selected' : '' }}>Legal</option>
                    </select>
                </label>
            </div>
            <div class="buttons">
                <button >Update</button>
            </div>

        </form>

    </div>
</div>
</body>
</html>
