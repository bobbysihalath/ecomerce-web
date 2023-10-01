@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <h3>ລາຍການສິນຄ້າທັງໝົດ</h3>
                        <a href="{{url('/insert-product')}}" class="btn btn-info float-right">
                                ເພິມຂໍ້ມູນສິນຄ້າ
                        </a>
                    </div>
                </div>
            </div>
        </div>




            <div class="card shadow ">
                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 p-4">
                                <div class="card">
                                    <a href="#"><img class="card-img-top" src="{{asset($product->image) }} " alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#">{{$product->name}}</a>
                                        </h4>
                                        <h4 class="card-title">
                                            {{$product->price}}
                                        </h4>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <a href="/update-product/{{$product->id}}">
                                            <button class="btn btn-primary mr-2">ແກ້ໄຂ</button>
                                        </a>

                                        <a href="/delete-product/{{$product->id}}">
                                            <button class="btn btn-danger">ລືບ</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>

@endsection
