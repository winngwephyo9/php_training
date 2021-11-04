<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function html_email()
    {
        $data = array('name' => "WNP");
        Mail::send('mail', $data, function ($message) {
            $message->to('ngwephyowin@gmail.com')
                ->subject('Testing Mail');
        });
        echo "HTML Email Sent. Check your inbox.";
    }

    public function mailBook($id)
    {
        $where = array('id' => $id);
        $book = Book::where($where)->first();
        $data = [
            'name' => $book->name,
            'detail' => $book->detail,
        ];
        Mail::send('books\mail', $data, function ($message) {
            $message->to('ngwephyowin@gmail.com')
                ->subject('book Info');
        });
        return back()
            ->with('success', 'Email Sent.');
    }
    public function create()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'subject' => $request->subject,
            'email' => $request->email,
            'content' => $request->content,
        ];
        Mail::send('email-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}
