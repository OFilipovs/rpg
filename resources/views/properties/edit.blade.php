<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RPG - {{ $property->name }} </title>

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
        <div class="label">Owner (Person ID):</div>
        <div class="label">Name:</div>
        <div class="label">Cadastral number:</div>
        <div class="label">Status:</div>
    </div>
    <div class="right-column">
        <form action="{{  route('properties.update', $property) }}" method="post">
            @csrf
            @method('put')

            <div class="value">{{ $property->id }}</div>
            <div>
                <label id="person_id">
                    <select name="person_id">
                        <option value="{{  $property->person->id }}" selected>{{  $property->person->personal_id_number }}</option>
                        @foreach ($people as $person)
                            <option value="{{ $person->id }}">{{ $person->personal_id_number }}</option>
                        @endforeach
                    </select>
                </label>
                <x-input-error :messages="$errors->get('person_id')" class="error-message"/>
            </div>
            <div class="input">
                <input type="text" name="name" value="{{ $property->name }}">
                <x-input-error :messages="$errors->get('name')" class="error-message"/>
            </div>
            <div class="input">
                <input type="text" name="cadastral_number" value="{{ $property->cadastral_number }}">
                <x-input-error :messages="$errors->get('cadastral_number')" class="error-message"/>
            </div>

            <div class="input">
                <label id="status">
                    <select name="status">
                        <option value="{{  $property->status }}" selected>{{  $property->status }}</option>
                        <option value="purchase agreement">Purchase agreement</option>
                        <option value="paid">Paid</option>
                        <option value="registered in land registry">Registered in land registry</option>
                        <option value="sold">Sold</option>
                    </select>
                </label>
                <x-input-error :messages="$errors->get('status')" class="error-message"/>
            </div>
            <div class="buttons">
                <button>Update</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
