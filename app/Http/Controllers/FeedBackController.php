<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use Illuminate\Support\Facades\DB;


class FeedBackController extends Controller
{
    function index()
    {
        $data = FeedBack::all();
        return $data;
    }

    function store(Request $request)
    {
        $fb =new Feedback();
        $fb->raised_requests_id = $request->raised_requests_id;
        $fb->description = $request->description;
        $fb->save();
    }
}
