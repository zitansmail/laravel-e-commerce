@extends('Layouts.app')
@section('title')
Laravel-E-commerce | products
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="mt-2 px-4 py-4 bg-white font-semibold text-lg">
                <h1 class="font-bold text-orange-1000">Category</h1>
                <ul>
                    @foreach ($categories as $item)
                    <li class="mt-2"><a href="{{ route('shop.index', ['category'=>$item->name]) }}" class="text-sm ">{{ $item->name }}</a></li>    
                    @endforeach
                
                </ul>
            </div>
            <div class="mt-4 px-4 py-4 bg-white font-semibold text-lg">
                <h1 class="font-bold text-orange-1000">Category</h1>
                <ul>
                    <li class="mt-2"><a href="#" class="text-sm ">Man</a></li>
                    <li class="mt-2"><a href="#" class="text-sm ">Women</a></li>
                    <li class="mt-2"><a href="#" class="text-sm ">Children</a></li>
                    <li class="mt-2"><a href="#" class="text-sm ">Hot Deals</a></li>
                </ul>
            </div>
            <div class="mt-4 px-4 py-4 bg-white font-semibold text-lg">
                <h1 class="font-bold text-orange-1000">Category</h1>
                <ul>
                    <li class="mt-2"><a href="#" class="text-sm ">Man</a></li>
                    <li class="mt-2"><a href="#" class="text-sm ">Women</a></li>
                    <li class="mt-2"><a href="#" class="text-sm ">Children</a></li>
                    <li class="mt-2"><a href="#" class="text-sm ">Hot Deals</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
        <h1 class="text-lg font-bold text-center my-2">{{ $categorie_Name }}</h1>
            <div class="flex flex-wrap">
                @foreach ($products as $item)
                <div class="col-md-4">
                    <product class="mt-2 mb-2"link="{{ url('product/'.$item->id) }}" price="{{ $item->price }}" title="{{ $item->name}}" image="{{ asset('images/cos.png')}}"></product>
                </div>
                @endforeach

                <div class="text-center mt-2 mb-2">
                    {{ $products->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
    </div>

    <mail class="mt-4"/>

</div>
    
@endsection