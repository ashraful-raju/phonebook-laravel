<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    private function validate(Request $request) {
        return $request->validate([
            'type' => ['required', 'string'],
            'data' => ['required', 'string']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Contact $contact, Request $request)
    {
        $data = $this->validate($request);

        $contact->details()->create($data);

        return back()->with('alert', 'Contact details added successfully!');
    }

    /**
     * Update a resource in storage.
     */
    public function update(Request $request, Contact $contact, ContactDetail $detail)
    {
        $data = $this->validate($request);

        $detail->update($data);

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
