<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Tables\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Splade;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.countries.index', [
            'countries' => Country::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request): RedirectResponse
    {
        $country = \App\Models\Country::create($request->validated());
        if ($country) {
            Splade::toast('Country created')->success()->centerTop()->autoDismiss(3);
            return to_route('admin.countries.index');
        } else {
            Splade::toast('Country Is Failed to Create')->danger()->centerTop()->autoDismiss(3);
            return to_route('admin.countries.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Country $country): View
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, \App\Models\Country $country): RedirectResponse
    {
        $countryUpdate = $country->update($request->validated());
        if ($countryUpdate) {
            Splade::toast('Country updated')->success()->centerTop()->autoDismiss(3);
            return to_route('admin.countries.index');
        } else {
            Splade::toast('Country Is Failed to update')->danger()->centerTop()->autoDismiss(3);
            return to_route('admin.countries.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Country $country): RedirectResponse
    {
        $country->delete();
        Splade::toast('Country deleted')->success()->centerTop()->autoDismiss(3);
        return back();
    }
}
