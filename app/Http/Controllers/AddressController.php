<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Contact $contact, AddressRequest $request)
    {
        $contact->addresses()->create($request->validated());

        return back()->with('alert', 'Contact address added successfully!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Contact $contact,  Address $address)
    {
        $address->update($request->validated());

        return back()->with('alert', 'Contact address updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact, Address $address)
    {
        $address->delete();

        return back()->with('alert', 'Contact address deleted successfully!');
    }
}
