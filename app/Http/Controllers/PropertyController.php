<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function index(): View
    {
        $properties = Property::with('person')->paginate(10);
        $people = Person::all();

        return view('properties.index', compact('properties', 'people'));
    }

    public function show(Property $property): View
    {
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property): View
    {
        $people = Person::all();
        return view('properties.edit', compact('property', 'people'));
    }

    public function store(Request $request): RedirectResponse
    {
        $test = $request->validate([
            'person_id' => 'required',
            'name' => 'required',
            'cadastral_number' => [
                'required',
                'unique:properties',
                'regex:/^[0-9]{11}$/'
            ],
            'status' => ['required', Rule::in(['purchase agreement', 'paid', 'registered in land registry', 'sold'])],
        ], [
            'cadastral_number.regex' => 'The cadastral number must be exactly 11 digits long.'
        ]);

        Property::create($test);

        return redirect()->route('properties.index');
    }

    public function update(Request $request, Property $property): RedirectResponse
    {

        $view = $request->validate([
            'person_id' => 'required|exists:people,id',
            'name' => 'required',
            'cadastral_number' => [
                'required',
                'unique:properties',
                'regex:/^[0-9]{11}$/'
            ],
            'status' => ['required', Rule::in(['purchase agreement', 'paid', 'registered in land registry', 'sold'])],
        ], [
            'cadastral_number.regex' => 'The cadastral number must be exactly 11 digits long.'
        ]);

        $property->update($view);

        return redirect()->route('properties.show', $property);
    }

    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();

        return redirect()->route('properties.index');
    }
}
