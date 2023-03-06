<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonController extends Controller
{
    public function index(): View
    {
        $persons = Person::paginate(10);

        return view('persons.index', compact('persons'));
    }

    public function show(Person $person): View
    {
        return view('persons.show', compact('person'));
    }

    public function edit(Person $person): View
    {
        return view('persons.edit', compact('person'));
    }

    public function store(Request $request): RedirectResponse
    {

        $test = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'personal_id_number' => 'required|unique:people',
            'type' => 'required',
        ]);


        Person::create($test);

        return redirect()->route('persons.index');
    }

    public function update(Request $request, Person $person)
    {

        $view = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'personal_id_number' => 'required|unique:people,personal_id_number,' . $person->id,
            'type' => 'required',
        ]);

        $person->update($view);

        return redirect()->route('persons.show', $person);
    }

    public function destroy(Person $person): RedirectResponse
    {
        $person->delete();

        return redirect()->route('persons.index');
    }

}
