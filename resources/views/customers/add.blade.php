@extends('layouts.master')
@section('title') เพิ่มข้อมูลลูกค้า | ร้านขายหนังสือ ม.เนินหอม @stop
@section('content')
{{
    Form::open(array('method' => 'POST',
            'enctype' => 'multipart/form-data',
            'action' => 'App\Http\Controllers\CustomersController@create'))  
}}

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>เพิ่มข้อมูลลูกค้า</strong>
        </div>
    </div>

    <div class="panel-body">
        <table class="table tabler-bordered">
            <caption>
                <h1>เพิ่มข้อมูลลูกค้า</h1>
            </caption>
            <tr>
                <td> {{ Form::label('firstname', 'ชื่อ') }} </td>
                <td> {{ Form::text('firstname', Request::old('firstname'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('lastname', 'นามสกุล') }} </td>
                <td> {{ Form::text('lastname', Request::old('lastname'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('phone', 'เบอร์โทร') }} </td>
                <td> {{ Form::text('phone', Request::old('phone'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('book_id', 'รายชื่อหนังสือ') }} </td>
                <td> {{ Form::select('book_id', $books, Request::old('book_id'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('image', 'เลือกรูปภาพลูกค้า') }} </td>
                <td> {{ Form::file('image') }} </td>
            </tr>
        </table>
    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ URL::to('customers/') }}" class="btn btn-danger">ยกเลิก</a>
    </div>
</div>
{{ Form::close() }}
@endsection