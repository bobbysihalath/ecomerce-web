@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('ເພິ່ມຂໍ້ມູນຊື່ແບຣນ') }}</h1>
                                    </div>


                                    <form method="POST" action="{{ route('insert-brand') }}" enctype="multipart/form-data" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('ຊື່ແບຣນ') }}" value="{{ old('name') }}" required autofocus>
                                        </div>



                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('ເພິ່ມຂໍ້ມູນ') }}
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
