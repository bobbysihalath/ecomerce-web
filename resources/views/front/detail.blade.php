<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ໜ໊າຫຼັກ</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">ໜ້າຫຼັກສິນຄ້າ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">ໜ້າຫຼັກ</a></li>
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ເບິງສິນຄ້າ</a>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                {{--                        <li><a class="dropdown-item" href="#!">All Products</a></li>--}}
                {{--                        <li><hr class="dropdown-divider" /></li>--}}
                {{--                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>--}}
                {{--                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
            </ul>
            {{--            <form class="d-flex">--}}
            {{--                <button class="btn btn-outline-dark" type="submit">--}}
            {{--                    <i class="bi-cart-fill me-1"></i>--}}
            {{--                    Cart--}}
            {{--                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>--}}
            {{--                </button>--}}
            {{--            </form>--}}
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">ເລືອກລາຍການສິນຄ້າຕາມທີ່ທ່ານຕ້ອງການ</h1>
            <p class="lead fw-normal text-white-50 mb-0">ກັບພວກເຮົາ</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="{{asset($product->image) }} " /></div>
                            </div>


                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">ຊື່ສິນຄ້າ {{ $product->name }}</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">ຄຳເຫັນ: {{ count($product->comment) }} </span>
                            </div>
                            <p class="product-description">
                                ລາຍລະອຽດ: <br/>{{$product->description}}
                            </p>
                            <h4 class="text-success">ລາຄາ: <span>LAK {{ number_format($product->price)  }}</span></h4>
                            <p class="text-success"><strong>ສ່ວນຫຼຸດ: {{ number_format($product->discount) }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    @foreach($product->comment as $item)
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info">
                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">
                                   {{ $item->user->name }}</span>
                                <span class="date text-black-50">{{$item->created_at}}</span></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text">
                                {{ $item->comment }}
                            </p>
                        </div>
                    </div>
                    @endforeach


                    <div class="bg-light p-2">
                        <form method="POST" action="{{ url('/client/comment') }}">
                             @csrf
                            <div class="d-flex flex-row align-items-start">
                                <textarea class="form-control ml-1 shadow-none textarea" name="comment" ></textarea>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                            </div>
                            <div class="mt-2 text-right">
                                @auth
                                    <a href="">
                                        <button class="btn btn-primary btn-sm shadow-none" type="submit">
                                            ເພິ່ມຄຳເຫັນ
                                        </button>
                                    </a>
                                @else
                                    <a  class="text-center" href="/login">
                                        <button class="btn btn-primary btn-sm shadow-none" type="button">
                                            <i class="fa fa-sign-in"></i>ເຂົ້າສູ່ລະບົບ
                                        </button>
                                    </a>
                                @endauth

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy;  2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('front/js/scripts.js') }}"></script>
</body>
</html>




