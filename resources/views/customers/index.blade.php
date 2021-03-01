@extends('layouts.master')
@section('title') ลูกค้า | ร้านขายหนังสือ ม.เนินหอม @stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>ลูกค้า</strong>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('customers/search') }}" class="form-inline" method="POST">
            @csrf
            <input type="text" name="q" class="form-control" placeholder="ค้นหา">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="{{ URL::to('customers/add') }}" class="btn btn-success pull-right">เพิ่มลูกค้า</a>
        </form>
    </div>
    <table class="table table-bordered table-striped bs-table">
        <thead>
            <tr>
                <th>รูปลูกค้า</th>
                <th>ชื่อ - นามสกุล</th>
                <th>เบอร์โทร</th>
                <th>หนังสือ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $c)
            <tr>
                <td><img src="http://127.0.0.1:8000/{{ $c->image_url }}" width="50px"></td>
                <td>{{ $c->firstname }} {{ $c->lastname }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->books->name }}</td>
                <td>
                    <a href="#" class="btn btn-warning edit" id-edit={{ $c->id }}>แก้ไข</a>
                    <a href="#" class="btn btn-danger delete" id-delete="{{ $c->id }}">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="panel-footer">
        <span>แสดงข้อมูลจำนวน {{ count($customers) }} ข้อมูล</span>
    </div>
</div>

<script>
    $('.edit').on('click', function () {
        var url = "{{ URL::to('customers/edit') }}" + "/" + $(this).attr('id-edit')
        window.location.href = url
    })

    $('.delete').on('click', function () {
        if (confirm('คุณต้องการลบข้อมูลลูกค้าหรือไม่ ?')) {
            var url = "{{ URL::to('customers/remove') }}" + "/" + $(this).attr('id-delete')
            window.location.href = url
        }
    })
</script>
@endsection