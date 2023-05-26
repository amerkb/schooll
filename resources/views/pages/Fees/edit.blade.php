@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل رسوم دراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    تعديل رسوم دراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('updatefee', 'test') }}" method="" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        {{-- <div class="form-group col">
                                <label for="inputEmail4">الاسم باللغة العربية</label>
                                <input type="text" value="{{$fee->getTranslation('title','ar')}}" name="title_ar" class="form-control">
                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">
                            </div> --}}
                        <div class="form-group col">
                            <label for="inputEmail4">Name</label>
                            <input type="text" value="{{ $fee->title }}" name="title_en" class="form-control">
                        </div>

                        <input type="hidden" value="{{ $fee->id }}" name="id" class="form-control">


                        <div class="form-group col">
                            <label for="inputEmail4">The Amount</label>
                            <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">Grade</label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}"
                                        {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>{{ $Grade->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">The Class</label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">
                                <option value="{{ $fee->Classroom_id }}">{{ $fee->classroom->Name_Class }}</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">Academic year</label>
                            <select class="custom-select mr-sm-2" name="year">
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}" {{ $year == $fee->year ? 'selected' : ' ' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="form-group col">
                            <label for="inputZip">Fee type</label>
                            <select class="custom-select mr-sm-2" name="Fee_type">
                                <option value="1">Tuition fees</option>
                                <option value="2">Bus fees</option>
                            </select>
                        </div>
                    
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Notes</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $fee->description }}</textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
