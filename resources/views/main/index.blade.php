@extends('layouts.main')

@section('content')
<main>
    <!-- slider area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/slider/top.jpg" >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Интернет-магазин автозапчастей</h1>
                        <div class="page__title-breadcrumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider area end -->
    <main>
        <!-- cart-area start -->
        <section class="cart-area pb-120 pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container grey-bg-3  d-md-block pt-10 pb-10">
                            <div class="row align-items-center">
                                @livewire('search-products')
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
 </main>
@endsection
