@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    @if (session('addhospitalstatus'))
    <div class="alert alert-success" role="alert">
        {{ session('addhospitalstatus') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" class="border border-light p-5">
        @csrf
        <p class="h4 mb-4 text-center">اضافة مستشفي</p>

        <div class="form-group">
            <label for="formGroupExampleInput">الاسم</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">المحافظة</label>
            <input type="text" class="form-control" name="city">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">العنوان</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">رقم التليفون</label>
            <input type="number" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">الاماكن المتاحة</label>
            <input type="text" class="form-control" name="capacity">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">عدد الدخول</label>
            <input type="text" class="form-control" name="checkins">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">اسم المستخدم</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">كلمة السر</label>
            <input type="text" class="form-control" name="password">
        </div>

        <button class="btn btn-info btn-block my-4" name="addhospital" type="submit">اضافة</button>
    </form>
</div>
@endsection