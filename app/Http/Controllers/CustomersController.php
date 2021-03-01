<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();

        return view('customers/index', compact('customers'));
    }

    public function search(Request $req)
    {
        $query = $req->q;

        if ($query) {
            $customers = Customers::where('firstname', 'like', '%'.$query.'%')
                                    ->orWhere('lastname', 'like', '%'.$query.'%')->get();
        } else {
            $customers = Customers::all();
        }

        return view('customers/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $data = array(
            'firstname'  => $req->firstname,
            'lastname'   => $req->lastname,
            'phone'      => $req->phone,
            'book_id'    => $req->book_id
        );

        $rule = array(
            'firstname'  => 'required',
            'lastname'   => 'required',
            'phone'      => 'required',
            'book_id'    => 'required|numeric'
        );

        $message = array(
            'required' => 'กรุณากรอก :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอก :attribute เป็นตัวเลข'
        );

        $validator = Validator::make($data, $rule, $message);

        if ($validator->fails()) {
            return redirect('customers/add')
                    ->withErrors($validator)
                    ->withInput();
        }

        $customer = new Customers();
        $customer->firstname = $req->firstname;
        $customer->lastname = $req->lastname;
        $customer->phone = $req->phone;
        $customer->book_id = $req->book_id;

        if ($req->hasFile('image')) {
            $f = $req->file('image');

            $upload_to = 'upload/images';

            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;

            $f->move($absolute_path, $f->getClientOriginalName());
            $customer->image_url = $relative_path;
        }

        $customer->save();

        return redirect('customers')
                ->with('ok', true)
                ->with('msg', 'เพิ่มข้อมูลลูกค้าเรียบร้อย');
    }

    /**
     * Show the form for add the specified resource.
     */
    public function add()
    {
        $books = Books::pluck('name', 'id')->prepend('เลือกรายการ', '');

        return view('customers/add')->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $customer = Customers::where('id', $id)->first();
        $books = Books::pluck('name', 'id')->prepend('เลือกรายการ', '');

        return view('customers/edit')
                ->with('customer', $customer)
                ->with('books', $books);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $data = array(
            'firstname'  => $req->firstname,
            'lastname'   => $req->lastname,
            'phone'      => $req->phone,
            'book_id'    => $req->book_id
        );

        $rule = array(
            'firstname'  => 'required',
            'lastname'   => 'required',
            'phone'      => 'required',
            'book_id'    => 'required|numeric'
        );

        $message = array(
            'required' => 'กรุณากรอก :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอก :attribute เป็นตัวเลข'
        );

        $validator = Validator::make($data, $rule, $message);

        if ($validator->fails()) {
            return redirect('customers/edit/'.$req->id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $customer = Customers::find($req->id);
        $customer->firstname = $req->firstname;
        $customer->lastname = $req->lastname;
        $customer->phone = $req->phone;
        $customer->book_id = $req->book_id;

        if ($req->hasFile('image')) {
            $f = $req->file('image');

            $upload_to = 'upload/images';

            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;

            $f->move($absolute_path, $f->getClientOriginalName());
            $customer->image_url = $relative_path;
        }

        $customer->save();

        return redirect('customers')
                ->with('ok', true)
                ->with('msg', 'แก้ไขข้อมูลลูกค้าเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::find($id)->delete();

        return redirect('customers/')
                ->with('ok', true)
                ->with('msg', "ลบเรียบร้อย");
    }
}
