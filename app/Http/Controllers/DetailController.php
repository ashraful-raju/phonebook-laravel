<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Models\Contact;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Contact $contact, DetailRequest $request)
    {
        // $request->all();
        // $request->only(['']);
        // $request->input('name')
        // $request->get('search')
        // $request->post('number')
        // $request->file('photo')

        $contact->details()->create($request->validated());

        return back()->with('alert', 'Contact details added successfully!');
    }

    /**
     * Update a resource in storage.
     */
    public function update(DetailRequest $request, Contact $contact, ContactDetail $detail)
    {
        $detail->update($request->validated());

        return back()->with('alert', 'Contact details updated successfully!');
    }

    /**
     * Delete a resource in storage.
     */
    public function destroy(Contact $contact, ContactDetail $detail)
    {
        $detail->delete();

        return back()->with('alert', 'Contact details deleted successfully!');
    }
}
