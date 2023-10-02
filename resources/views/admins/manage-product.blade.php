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
                                            ລາຄາ: {{number_format( $product->price, 2)}}
                                        </h4>
                                        <small class="card-title">
                                            ສ່ວນຫລຸດ: {{number_format( $product->discout, 2)}}
                                        </small>
                                        <p class="card-text">ຈຳນວນ: {{ $product->stock }}</p>
                                        <p class="card-text">ລາຍລະອຽດ: {{ $product->description }}</p>
                                        <a href="/update-product/{{$product->id}}">
                                            <button
                                                type="button"
                                                class="btn btn-outline-primary ml-2">
                                                <i class="fa fa-edit"></i>
                                                ແກ້ໄຂ
                                            </button>

                                        </a>

                                        <a href="/delete-product/{{$product->id}}">
                                            <button type="button"
                                                    class="btn btn-outline-danger ml-2">
                                                <i class="fa fa-trash"></i>
                                                ລືບ
                                            </button>
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
