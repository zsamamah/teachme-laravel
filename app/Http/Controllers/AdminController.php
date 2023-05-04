<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all('id');
        $contacts = Contact::all('id');
        return view('admin.index',compact('users','contacts'));
    }
    
    public function users()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function delete_user(User $user)
    {
        if($user->role!='admin'){
            $user->deleteOrFail();
            return redirect('/users');
        }
        return redirect('/users');
    }

    public function contacts()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }

    public function delete_contact(Contact $contact)
    {
        $contact->deleteOrFail();
        return redirect('/contacts');
    }
}
