<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Contact as ContactResource;

class ContactsController extends Controller
{
    public function index(){

        $this->authorize('viewAny',Contact::class);

        return ContactResource::collection(request()->user()->contacts);
    }
    public function store(){

        $this->authorize('create',Contact::class);

        $contact=request()->user()->contacts()->create($this->validteDate());

        return (new ContactResource($contact))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Contact $contact){

        
     $this->authorize('view',$contact);
     return new ContactResource($contact);
    }
    public function update(Contact $contact){


        $this->authorize('update',$contact);


        $contact->update($this->validteDate());

        return (new ContactResource($contact))
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Contact $contact){
        $this->authorize('delete',$contact);
        $contact->delete();
    }

    private function validteDate(){

        return request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'birthday'=>'required',
            'company'=>'required',

        ]);
    }
}
