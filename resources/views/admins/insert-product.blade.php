@extends('layouts.admin')

@section('main-content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h1>ຟອມປ້ອນຂໍ້ມູນ <i class="fa fa-mobile" aria-hidden="true"></i></h1>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <form class="form-container" method="POST" action="{{ route('insert-product') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="image" type="file" class="form-control  form-control-user"  name="image" required>

                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-md-2 control-label">ຊື່ສິນຄ້າ</label>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="name" type="text" class="form-control  form-control-user" name="name"
                                               value="{{ old('name') }}"
                                               required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="brand" class="col-md-2 control-label">ແບຣນ</label>

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <select class="form-control form-control-user" aria-label="Default select example" name="brand"  id="brand" >
                                            <option>ກະລຸນາເລືອກ</option>
                                            @foreach($brand as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('brand'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('brand') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="description" class="col-md-2 control-label">ລາຍລະອຽດ</label>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="description" type="text" class="form-control form-control-user" name="description"
                                               value="{{ old('description') }}" required autofocus>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="price" class="col-md-2 control-label">ລາຄາ</label>

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <input id="price" type="number" class="form-control form-control-user" name="price"
                                               value="{{ old('price') }}" required autofocus>

                                        @if ($errors->has('price'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="discount" class="col-md-2 control-label">ສ່ວນຫລຸດ</label>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="discount" type="number" class="form-control form-control-user " name="discount"
                                               value="{{ old('discount') }}" required autofocus>

                                        @if ($errors->has('discount'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('discount') }}</strong>
                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label for="stock" class="col-md-2 control-label">ຈຳນວນ</label>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="stock" type="text" class="form-control form-control-user" name="stock"
                                               value="{{ old('stock') }}" required autofocus>

                                        @if ($errors->has('stock'))
                                            <span class="help-block"><strong>{{ $errors->first('stock') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary w-100" value="ເພິມຂໍ້ມູນສິນຄ້າ">


                        </form>

                        <div class="col-md-2 col-sm-2 col-xs-12"></div>
                    </div>
                </div>

            </div>
        </div>


@endsection
