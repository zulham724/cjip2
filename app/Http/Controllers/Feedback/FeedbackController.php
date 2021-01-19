<?php

namespace App\Http\Controllers\Feedback;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class FeedbackController extends Controller
{
    public function feedback(Request $request){


            $this->validate($request, [
                'rating' => 'required'
            ]);

        $feedback = new Feedback();
        $feedback->feedback = $request->feedback;
        $feedback->rate = $request->rating;
        $feedback->user_id = $request->user;
        $feedback->save();

        return redirect()->back();
    }
}
