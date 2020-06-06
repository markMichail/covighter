@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>المحافظة</th>
                            <th>العنوان</th>
                            <th>رقم التليفون</th>
                            <th>الاماكن المتاحة</th>
                            <th>عدد الدخول</th>
                            <th>عدد الخروج</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitals as $i => $hospital)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $hospital->name }}</td>
                            <td>{{ $hospital->city }}</td>
                            <td>{{ $hospital->address }}</td>
                            <td>{{ $hospital->phone }}</td>
                            <td>{{ $hospital->capacity }}</td>
                            <td>{{ $hospital->checkins }}</td>
                            <td>{{ $hospital->checkouts }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection