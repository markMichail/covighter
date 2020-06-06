@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session('addhospitalstatus'))
        <div class="alert alert-success" role="alert">
            {{ session('addhospitalstatus') }}
        </div>
        @endif
        <form method="POST" class="border border-light p-5">
            @csrf
            <p class="h4 mb-4 text-center">مستشفي الدمرداش</p>

            <div class="form-group">
                <label for="formGroupExampleInput">الاماكن المتاحة</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">عدد الدخول</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">عدد الخروج</label>
                <input type="number" class="form-control" id="formGroupExampleInput2">
            </div>

            <button class="btn btn-info btn-block my-4" name="updatehospital" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection