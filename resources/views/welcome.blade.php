@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 style="text-align: center">جميع المستشفيات</h2>

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
                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                            @foreach ($hospitals as $i => $hospital)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->city }}</td>
                                <td>{{ $hospital->phone }}</td>
                                <td>{{ $hospital->capacity }}</td>
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