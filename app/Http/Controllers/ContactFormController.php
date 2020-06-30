<?php
namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);
        Mail::to('feedback@Matvest.ru')->send(new ContactFormMail($data));
        return view('contact.success');
    }
}
