<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use Illuminate\Support\Facades\DB;


class FeedBackController extends Controller
{
    function index()
    {
        $data = FeedBack::with('user')->get();
        return $data;
    }

    function store(Request $request)
    {
        $fb =new Feedback();
        $fb->description = $request->description;
        $fb->user_id = $request->user_id;
        $fb->raised_id = $request->raised_id;
        $fb->save();

        return $fb;
    }
}
