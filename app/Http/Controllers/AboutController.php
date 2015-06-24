<?php namespace todoparrot\Http\Controllers;

use todoparrot\Http\Requests;
use todoparrot\Http\Controllers\Controller;
use todoparrot\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class AboutController extends Controller {

	function index()
    {
        return view('about.index');
    }

    function create()
    {
        return view('about.contact');
    }

    public function store(ContactFormRequest $request)
    {
        \Mail::send('emails.contact',
            array(
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'user_message'=>$request->get('message')
            ),function($message)
            {
                $message->from('mgudesblatart@gmail.com');
                $message->to('mgudesblatart@gmail.com', 'Admin')->subject('TODOParrot Feedback');
            });

        return \Redirect::route('contact')->with('message', 'Thanks for Contacting us!');
    }

}
