@extends('layouts.admin_layout')

@section('title', 'Редактировать продукт')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт: {{ $product['nomenclature'] }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('product.update', $product['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <!--  <div class="form-group">
                                    <label for="feature_image">Изображение товара</label>
                                    <img src="{{ $product['img'] }}" alt="" class="img-uploaded"
                                         style="display: block; width: 300px">
                                    <input type="text" value="{{ $product['img'] }}" name="img" class="form-control"
                                           id="feature_image" name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                                </div>-->

                               <div class="form-group">
                                    <label for="exampleInputEmail1">Артикул</label>
                                    <input type="text" value="{{ $product['article'] }}" name="title" class="form-control"
                                        id="exampleInputEmail1" placeholder="Введите название товара" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="text" class="editor">{{ $product['nomenclature'] }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Цена</label>
                                    <input type="text" value="{{ $product['price'] }}" name="title" class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите цену товара" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Каличество</label>
                                    <input type="text" value="{{ $product['count'] }}" name="title" class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите количество товара" required>
                                </div>


                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Выберите склад</label>
                                        <select name="cat_id" class="form-control" required>
                                            @foreach ($stocks as $stock)
                                                <option value="{{ $stock['id'] }}" @if ($stock['id'] == $product['stock_id']) selected
                                                    @endif>{{ $stock['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>





                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
