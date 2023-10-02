@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-title card-body">
                <h2>ຟອມປ້ອນຂໍ້ມູນ</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('comment-insert-action') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddress">ຄຳເຫັນ</label>
                        <input type="text" class="form-control" id="comment" name="comment" placeholder="ປ້ອນຄຳເຫັນ" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">ສິນຄ້າ</label>
                        <select id="product" class="form-control" name="product_id" required>
                            <option selected>ເລືອກສິນຄ້າ</option>
                            @foreach($product as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">ບັນທືກຂໍ້ມູນ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
