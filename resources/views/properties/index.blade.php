<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RPG</title>

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
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"], select {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #3e8e41;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
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
    <div>
        Properties
    </div>
    <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Owner (Person ID)</th>
                <th>Name</th>
                <th>Cadastral Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->person->personal_id_number }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->cadastral_number }}</td>
                    <td>{{ $property->status }}</td>
                    <td>
                        <a href="/properties/{{ $property->id }}/" class="button">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div>
        <p>Add new property</p>
        <form action="{{  route('properties.store') }}" method="post">
            @csrf

            <label id="person_id">
                <select name="person_id">
                    <option value="" selected disabled>Select a person</option>
                    @foreach ($people as $person)
                        <option value="{{ $person->id }}">{{ $person->personal_id_number }}</option>
                    @endforeach
                </select>
            </label>
            <x-input-error :messages="$errors->get('person_id')" class="error-message"/>

            <input type="text" name="name" placeholder="Property name">
            <x-input-error :messages="$errors->get('name')" class="error-message"/>

            <input type="text" name="cadastral_number" placeholder="Cadastral number">
            <x-input-error :messages="$errors->get('cadastral_number')" class="error-message"/>

            <label id="status">
                <select name="status">
                    <option value="" selected disabled>Select a status</option>
                    <option value="purchase agreement">Purchase agreement</option>
                    <option value="paid">Paid</option>
                    <option value="registered in land registry">Registered in land registry</option>
                    <option value="sold">Sold</option>
                </select>
            </label>
            <x-input-error :messages="$errors->get('status')" class="error-message"/>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
