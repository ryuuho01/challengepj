<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        // $items = Contact::all();
        return view('index');
    }

    public function contact()
    {
        // $items = Contact::all();
        return view('contact');
    }

    // public function postal_code()
    // {
    //     // $items = Contact::all();
    //     return view('contact');
    // }

    public function confirm(Request $request)
    {
        return view('confirm', ['items' => $request]);
    }

    public function post(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $form = $request->all();
        unset($form['_token']);
        if ($form['gender'] == "男性") {
            $form['gender'] = 1;
        } else {
            $form['gender'] = 2;
        }
        Contact::create($form);
        return view('thank');
    }

    public function thank()
    {
        return view('thank');
    }

    public function manage(Request $request)
    {
        $sesrequest = $request->session()->get('msg');
        if ($sesrequest == null) {
            $params = [
                'name' => "",
                'gender1' => "checked",
                'gender2' => "",
                'gender3' => "",
                'datestart' => "",
                'dateend' => "",
                'email' => "",
            ];
            $items = Contact::paginate(7);
            return view('manage', ['items' => $items, 'olddata' => $params]);
        }  else {
        if ($sesrequest['gender'] != 3) {
            if ($sesrequest['datestart'] == null || $sesrequest['dateend'] == null) {
                $data = Contact::where('fullname', 'LIKE', "%{$sesrequest['name']}%")
                ->where('email', 'LIKE', "%{$sesrequest['email']}%")
                ->where('gender', $sesrequest['gender'])
                    ->paginate(7);
            } else {
                $data = Contact::where('fullname', 'LIKE', "%{$sesrequest['name']}%")
                ->where('email', 'LIKE', "%{$sesrequest['email']}%")
                ->where('gender', $sesrequest['gender'])
                    ->whereBetween('created_at', [$sesrequest['datestart'], $sesrequest['dateend']])
                    ->paginate(7);
            }
        } else if ($sesrequest['datestart'] == null || $sesrequest['dateend'] == null) {
            $data = Contact::where('fullname', 'LIKE', "%{$sesrequest['name']}%")
            ->where('email', 'LIKE', "%{$sesrequest['email']}%")
            ->paginate(7);
        } else {
            $data = Contact::where('fullname', 'LIKE', "%{$sesrequest['name']}%")
            ->where('email', 'LIKE', "%{$sesrequest['email']}%")
            ->whereBetween('created_at', [$sesrequest['datestart'], $sesrequest['dateend']])
                ->paginate(7);
        }
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['gender'] == "1") {
                $data[$i]['gender'] = "男性";
            } else {
                $data[$i]['gender'] = "女性";
            }
        }
        $all = "";
        $man = "";
        $woman = "";
        if ($sesrequest['gender'] == 3){
                $all = "checked";
        } else if($sesrequest['gender'] == 1){
                $man = "checked";
        } else if ($sesrequest['gender'] == 2) {
                $woman = "checked";
        }
            $params = [
                'name' => $sesrequest['name'],
                'gender1' => $all,
                'gender2' => $man,
                'gender3' => $woman,
                'datestart' => $sesrequest['datestart'],
                'dateend' => $sesrequest['dateend'],
                'email' => $sesrequest['email'],
            ];

            // $params = $sesrequest['name'];
        return view('manage', ['items' => $data, 'olddata' => $params]);
        }
    }

    public function search(Request $request)
    {
        $params = [
            'name' => $request->name,
            'gender' => $request->gender,
            'datestart' => $request->datestart,
            'dateend' => $request->dateend,
            'email' => $request->email,
        ];

        $request->session()->put('msg', $params);
        return redirect('manage');
    }

    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manage');
    }
}
