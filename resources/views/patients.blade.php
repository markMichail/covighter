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
            <p class="h4 mb-4 text-center">اضافة مريض</p>

            <div class="form-group">
                <label for="formGroupExampleInput">الاسم</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">الرقم القومي</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">تاريخ الميلاد</label>
                <input type="number" class="form-control" id="formGroupExampleInput2">
            </div>

            <button class="btn btn-info btn-block my-4" name="addhospital" type="submit">Add</button>


        </form>
        <br>
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
                                <th>الرقم القومي</th>
                                <th>رقم التليفون</th>
                                <th>تسجيل الدخول</th>
                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                            @foreach ($patients as $i => $patient)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->national_id }}</td>
                                <td>{{ $patient->mobile }}</td>
                                <td>{{ $patient->checkin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--Table body-->


                    </table>
                    <!--Table-->
                </div>
                </section>
                <!--Section: Live preview-->
            </div>
        </div>
    </div>
</div>
@endsection