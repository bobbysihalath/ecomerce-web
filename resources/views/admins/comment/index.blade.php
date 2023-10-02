@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="panel-body">
            <div class="d-flex justify-content-between">
                <h2>ຈັດການຂໍ້ມູນຄຳເຫັນ</h2>
                <a href="{{route('comment-insert')}}" class="float-right btn btn-info"><i class="fa fa-plus-circle"></i>&nbsp;ເພິ່ມຂໍ້ມູນ</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">ລາຍການຂໍ້ມູນຄຳເຫັນ</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">ຂໍ້ຄວາມ</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">ຜູ້ປ້ອນຄຳເຫັນ</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">ສິນຄ້າ</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">ວັນເວລາປ້ອນ</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">ວັນເວລາອັບເດດ</th>
                                <th scope="col" class="border-0 text-uppercase font-medium text-center">ຈັດການ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($comment) > 0)
                                @foreach($comment as $item => $key)
                                    <tr>
                                        <td class="pl-4">{{$item + 1}}.</td>
                                        <td>
                                            <h5 class="font-medium mb-0">{{ $key->comment }}</h5>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $key->user ? $key->user->name : 'N/A'}}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $key->product ?  $key->product->name : 'N/A'}}</span><br/>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $key->created_at }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $key->updated_at }}</span>
                                        </td>
                                        <td>

                                            <a href="/comment/update/{{$key->id}}" type="button"
                                                    class="btn btn-outline-primary btn-circle  btn-circle ml-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/comment/delete/{{$key->id}}" type="button"
                                                    class="btn btn-outline-primary btn-circle  btn-circle ml-2">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="6"><span class="font-medium text-danger">ບໍ່ພົບຂໍ້ມູນ</span>
                                    </td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
