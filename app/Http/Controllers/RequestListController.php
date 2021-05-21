<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CatRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\User;

class RequestListController extends Controller
{
    public function indexAdmin()
    {
        $cat_requests = CatRequest::get();
        
        return view('requestList.showAdmin.admin-request-list', ['catRequests' => $cat_requests]);
    }

    public function indexUser()
    {
        $cat_requests = CatRequest::where('requestor', auth()->user()->name)->get();

        return view('requestList.showUser.user-request-list', ['catRequests' => $cat_requests]);
    }

    
    public function showAdmin($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $catRequest = CatRequest::where('id', $requestID)->first();
        return view('requestList.showAdmin.requestDetails', ['catRequest' => $catRequest]);
    }

    public function showUser($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $catRequest = CatRequest::where('id', $requestID)->first();
        return view('requestList.showUser.requestDetails', ['catRequest' => $catRequest]);
    }

    public function update($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        $catRequest = CatRequest::where('id', $requestID)->first();
        $catRequest->progress = request()->input('progressdropdown');
        $catRequest->remark = (request()->input('rmk')) ? request()->input('rmk') : "No remark";
        $catRequest->save();

        if (request()->input('progressdropdown') == "complete") {
            Mail::send('emails.toUser.toUser', ['status' => 'Completed', 'catRequest' => $catRequest], function ($message) use ($catRequest) {
                $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
                $message->to($catRequest->email, $catRequest->requestor);
                $message->subject('Network Service Request Completed');
            });

        } else {
            Mail::send('emails.toUser.toUser', ['status' => 'Updated', 'catRequest' => $catRequest], function ($message) use ($catRequest) {
                $message->from(env('CONTROLLER_EMAIL_ADDRESS'), env('CONTROLLER_NAME'));
                $message->to($catRequest->email, $catRequest->requstor);
                $message->subject('Network Service Request Updated');
            });
        }

        echo '<script type="text/javascript">alert("The progress of the request has been updated successfully")</script>';
        return redirect()->back();
    }
    
    public function delete($requestID)
    {
        $requestID = Crypt::decryptString($requestID);
        CatRequest::where('id', $requestID)->delete();
        echo '<script type="text/javascript">alert("The request has been deleted successfully")</script>';
        return redirect('user-request-list');
    }

}
