<?php

namespace App\Http\Controllers;

use App\CatRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class ApprovalMailController extends Controller 
{
    public function approve($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $requestToBeApproved = CatRequest::where('id', $requestID)->first();
        $requestToBeApproved->status = "approved";
        $requestToBeApproved->save();

        Mail::send('emails.status', ['catRequest'=>$requestToBeApproved], function ($message) {
            $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
            $message->to(env('NETWORKTEAM_EMAIL_ADDRESS'), env('NETWORKTEAM_NAME'));
            $message->subject('A Request Has Been Approved and Ready for Process');
        });

        Mail::send('emails.toUser.toUser', ['status'=>'Approved', 'catRequest'=>$requestToBeApproved], function ($message) use ($requestToBeApproved) {
            $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
            $message->to($requestToBeApproved->email, $requestToBeApproved->requestor);
            $message->subject('Network Service Request Approved');
        });
       
        return view('approvalConfirmation.approved', ['catRequest' => $requestToBeApproved]);
    }

    public function refuse($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $requestToBeRefused = CatRequest::where('id', $requestID)->first();
        $requestToBeRefused->status = "refused";
        $requestToBeRefused->save();


        Mail::send('emails.toUser.toUser', ['status'=>'Refused', 'catRequest'=>$requestToBeRefused], function ($message) use ($requestToBeRefused) {
            $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
            $message->to($requestToBeRefused->email, $requestToBeRefused->requestor);
            $message->subject('Network Service Request Refused');
        });

        return view('approvalConfirmation.refused', ['catRequest' => $requestToBeRefused]);
    }
}
