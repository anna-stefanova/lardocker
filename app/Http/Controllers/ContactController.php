<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->has('comment')) {

            $data = $request->except('_token');
            $file = __DIR__ . '/data/dataCommentForm.json';

            $this->recordData($file, $data);
        }
        if ($request->has('order')) {
            $data = $request->except('_token');
            $file = __DIR__ . '/data/dataOrderForm.json';

            $this->recordData($file, $data);

        }
        return redirect()->route('contact.index');
    }


    private function recordData($file, $data) {
        $current = file_get_contents($file);
        if (! $current) $current = '[' . json_encode($data) . ']';
        else $current = mb_substr($current, 0, -1) . ', ' . json_encode($data) . ']';
        file_put_contents($file, $current);
    }
}
