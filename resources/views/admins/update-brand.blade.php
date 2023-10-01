@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('ແກ້ໄຂ້ຂໍ້ມູນ') }}</h1>



        <div class="card shadow mb-4">
            <div class="card-body">

                <form class="form-horizontal" method="POST" action="/update-brand" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <h6 class="heading-small text-muted mb-4">ລາຍລະອຽດຂໍ້ມູນ</h6>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">ຊື່ແບນ<span class="small text-danger">*</span></label>
                                    <input type="hidden" name="id" value="{{$brand->id}}">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $brand->name }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">ບັນທືກ</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>


@endsection
