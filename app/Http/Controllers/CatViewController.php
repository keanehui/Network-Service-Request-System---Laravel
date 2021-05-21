<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Category;
use App\CatRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class CatViewController extends Controller
{

    public function index()
    {
        
        //User::where('id', '7')->first()->assignRole('admin');
        //User::where('id', '7')->first()->removeRole('admin'); 
        //$role = Role::create(['name' => 'user']);

        $categories = Category::all();

        return view('index.index', [
            'categories' => $categories,
        ]);
    }

    public function support() {
        return view('index.support');
    }

    public function supportsubmit() {
        $user = Auth()->user();
        $problems = request()->input('supipt');

        Mail::send('emails.support', ['user' => $user, 'problems' => $problems], function ($message) {
            $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
            $message->to(env('NETWORKTEAM_EMAIL_ADDRESS'), env('NETWORKTEAM_NAME'));
            $message->subject('A User Needs Assisstance');
        });

        echo '<script type="text/javascript">alert("The Network Team has received your message and will reply to you as soon as possible")</script>';
        return redirect('/');
    }
    

    

    public function store(Request $request)
    {
        if (Category::where('name', '=', $request->input('catipt'))->exists())
            echo '<script type="text/javascript">alert("The category already exists")</script>';
        else {
            $n_category = new Category();
            $n_category->name = $request->input('catipt');
            $n_category->save();
            echo '<script type="text/javascript">alert("A category has been added successfully")</script>';
        }
        return redirect('/');
    }

    

    public function submit(Request $request)
    {
        $n_catrequest = new CatRequest();
        $n_catrequest->status = 'pending';
        $n_catrequest->requestor = Auth::user()->name;
        $n_catrequest->email = Auth::user()->email;
        $n_catrequest->category = $request->input('catiptcpy');

        if ($request->input('c1a1')) { $n_catrequest->c1a1 = $request->input('c1a1'); }
        if ($request->input('c1a2')) { $n_catrequest->c1a2 = $request->input('c1a2'); }
        if ($request->input('c1a3')) { $n_catrequest->c1a3 = $request->input('c1a3'); }
        if ($request->input('c2a1')) { $n_catrequest->c2a1 = $request->input('c2a1'); }
        if ($request->input('c2a2')) { $n_catrequest->c2a2 = $request->input('c2a2'); }
        if ($request->input('c2a3')) { $n_catrequest->c2a3 = $request->input('c2a3'); }
        if ($request->input('c3a1')) { $n_catrequest->c3a1 = $request->input('c3a1'); }
        if ($request->input('c3a2')) { $n_catrequest->c3a2 = $request->input('c3a2'); }
        if ($request->input('c3a3')) { $n_catrequest->c3a3 = $request->input('c3a3'); }
        if ($request->input('c4a1')) { $n_catrequest->c4a1 = $request->input('c4a1'); }
        if ($request->input('c4a2')) { $n_catrequest->c4a2 = $request->input('c4a2'); }
        if ($request->input('c4a3')) { $n_catrequest->c4a3 = $request->input('c4a3'); }
        if ($request->input('c5a1')) { $n_catrequest->c5a1 = $request->input('c5a1'); }
        if ($request->input('c5a2')) { $n_catrequest->c5a2 = $request->input('c5a2'); }
        if ($request->input('c5a3')) { $n_catrequest->c5a3 = $request->input('c5a3'); }
        if ($request->input('c0a1')) { $n_catrequest->c0a1 = $request->input('c0a1'); }
        if ($request->input('c0a2')) { $n_catrequest->c0a2 = $request->input('c0a2'); }

        $n_catrequest->save();

        Mail::send('emails.approval', ['catRequest' => $n_catrequest], function ($message) {
            $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
            $message->to(env('SUPERVISOR_EMAIL_ADDRESS'), env('SUPERVISOR_NAME'));
            $message->subject('A Request is Pending for Your Approval');
        });

        echo '<script type="text/javascript">alert("Your request has been submitted successfully")</script>';
        return redirect('/');
    }

    


}
