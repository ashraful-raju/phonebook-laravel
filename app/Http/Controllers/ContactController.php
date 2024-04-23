<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::paginate();

        return view('contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        if($request->hasfile('photo')){
            $validated['photo'] = $request->file('photo')->store('contacts');
        }

        $contact = Contact::create(
            Arr::only($validated, [
                'name','title','company','notes','photo'
            ])
        );

        if($request->has('mobile')){
            $contact->details()->create([
                'type' => 'mobile',
                'data' => $validated['mobile']
            ]);
        }

        if($request->has('email')){
            $contact->details()->create([
                'type' => 'email',
                'data' => $validated['email']
            ]);
        }

        return redirect()->route('contacts.index')
        ->with('alert', 'Contact added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $contact->load(['address', 'details']);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $contact->load(['address', 'details']);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $validated = $request->validated();
        $oldImage = $contact->getRawOriginal('photo');

        if($request->hasFile('photo')){
            $validated['photo'] = $request->file('photo')->store('contacts');
        }

        $contact->update($validated);

        if($request->hasFile('photo') && $oldImage){
            Storage::delete($oldImage);
        }

        return back()->with('alert', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back()->with('alert', 'Contact deleted successfully!');
    }
}
