@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    @if (session('labelstatus'))
    @if (session('labelstatus') == "low")
    <div class="alert alert-warning" role="alert">
        {{ session('labelstatus') }}
    </div>
    @else
    <div class="alert alert-danger" role="alert">
        {{ session('labelstatus') }}
    </div>
    @endif
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
        <p class="h4 mb-4 text-center">تحليل</p>

        <div class="form-group">
            <label>الرقم القومي</label>
            <input type="number" class="form-control" name="national_id">
        </div>

        <div class="form-group">
            <label>تاريخ الميلاد</label>
            <input type="date" class="form-control" name="birthdate">
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="fever" id="fever">
            <label class="custom-control-label" for="fever">fever</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="dry_cough" id="dry_cough">
            <label class="custom-control-label" for="dry_cough">dry_cough</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="tiredness" id="tiredness">
            <label class="custom-control-label" for="tiredness">tiredness</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="aches_and_pains" id="aches_and_pains">
            <label class="custom-control-label" for="aches_and_pains">aches_and_pains</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="sore_throat" id="sore_throat">
            <label class="custom-control-label" for="sore_throat">sore_throat</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="diarrhoea" id="diarrhoea">
            <label class="custom-control-label" for="diarrhoea">diarrhoea</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="conjunctivitis" id="conjunctivitis">
            <label class="custom-control-label" for="conjunctivitis">conjunctivitis</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="headache" id="headache">
            <label class="custom-control-label" for="headache">headache</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="diarrhoea" id="diarrhoea">
            <label class="custom-control-label" for="diarrhoea">diarrhoea</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="loss_of_smell" id="loss_of_smell">
            <label class="custom-control-label" for="loss_of_smell">loss_of_smell</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="difficulty_breathing" id="difficulty_breathing">
            <label class="custom-control-label" for="difficulty_breathing">difficulty_breathing</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="chest_pain" id="chest_pain">
            <label class="custom-control-label" for="chest_pain">chest_pain</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="loss_of_speech" id="loss_of_speech">
            <label class="custom-control-label" for="loss_of_speech">loss_of_speech</label>
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="loss_of_movement" id="loss_of_movement">
            <label class="custom-control-label" for="loss_of_movement">loss_of_movement</label>
        </div>
        <button class="btn btn-info btn-block my-4" name="test" type="submit">اختبار</button>
    </form>
</div>
@endsection