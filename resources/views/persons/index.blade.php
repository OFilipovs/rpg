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
        Persons
    </div>
    <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Personal ID</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($persons as $person)
                <tr>
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>{{ $person->personal_id_number }}</td>
                    <td>
                        <a href="/persons/{{ $person->id }}/" class="button">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div>
        <p>Make new person</p>
        <form action="/persons" method="post">
            @csrf
            <input type="text" name="first_name" placeholder="Name">
            <x-input-error :messages="$errors->get('first_name')" class="error-message"/>

            <input type="text" name="last_name" placeholder="Last Name">
            <x-input-error :messages="$errors->get('last_name')" class="error-message"/>

            <input type="text" name="personal_id_number" placeholder="Personal ID Number">
            <x-input-error :messages="$errors->get('personal_id_number')" class="error-message"/>

            <label id="type">
                <select name="type">
                    <option value="physical">Physical</option>
                    <option value="legal">Legal</option>
                </select>
            </label>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
