@extends('layouts.app')
@section('title')
    الرئيسية
@endsection
@section('header_title')
    الرئيسية
@endsection
@section('header_link')
    الرئيسية
@endsection
@section('header_text')
    الرئيسية
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-brands fa-product-hunt"></i></span>
                <div class="info-box-content">
                        <span class="info-box-text">المنتجات</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-cart-shopping"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">مشتريات</span>
                    <span class="info-box-number">410</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fa-solid fa-cart-plus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">مبيعات</span>
                    <span class="info-box-number">13,648</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa-solid fa-box-open"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">مخازن او نقاط بيع</span>
                    <span class="info-box-number">93,139</span>
                </div>

            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa-solid fa-file"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">تقارير</span>
                    <span class="info-box-number">1,410</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-secondary"><i class="fa-solid fa-user-tie"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">موردين</span>
                    <span class="info-box-number">410</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-dark"><i class="fa-solid fa-person"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">زبائن</span>
                    <span class="info-box-number">13,648</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-light"><i class="fa-solid fa-truck"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">شركات توصيل</span>
                    <span class="info-box-number">93,139</span>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
