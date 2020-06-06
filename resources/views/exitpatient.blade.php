@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            @if (session('exitpatientstatus'))
            <div class="alert alert-success" role="alert">
                {{ session('exitpatientstatus') }}
            </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الرقم القومي</th>
                            <th>رقم التليفون</th>
                            <th>تسجيل الدخول</th>
                            <th>تسجيل الخروج</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $i => $patient)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->national_id }}</td>
                            <td>{{ $patient->mobile }}</td>
                            <td>{{ $patient->checkin }}</td>

                            <td>
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="national_id" value="{{ $patient->national_id }}">
                                        <input type="submit" onclick="return confirm('تاكيد ؟')"
                                            class="btn btn-danger delete-user" value="خروج">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection