@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="table-responsive text-nowrap">
                    <!--Table-->
                    <table class="table table-striped">

                        <!--Table head-->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>المحافظة</th>
                                <th>رقم التليفون</th>
                                <th>الاماكن المتاحة</th>
                                <th>عدد الدخول</th>
                                <th>عدد الخروج</th>
                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                            @foreach ($hospitals as $hospital)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->city }}</td>
                                <td>{{ $hospital->phone }}</td>
                                <td>{{ $hospital->capacity }}</td>
                                <td>{{ $hospital->checkins }}</td>
                                <td>{{ $hospital->checkouts }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--Table body-->


                    </table>
                    <!--Table-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection