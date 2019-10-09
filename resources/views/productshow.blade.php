@extends('Layouts.app')
@section('title')
ProductShow
@endsection
@section('content')
<div class="bg-white">
    <div class="container">
         <div class="row mt-8">
        <div class="col-md-5">
            <div class="flex justify-center mb-4">
            <img src="{{ asset('images/cos.png')}}" class="w-56" alt="productshow">
            </div>
            <div class="flex justify-center">
                    <img src="{{ asset('images/cos.png')}}" class="w-24 hover:bg-orange-1000 bg-gray-200 mr-2" alt="productshow">
                    <img src="{{ asset('images/cos.png')}}" class="w-24 hover:bg-orange-1000 bg-gray-200 mr-2" alt="productshow">
                    <img src="{{ asset('images/cos.png')}}" class="w-24 hover:bg-orange-1000 bg-gray-200 mr-2" alt="productshow">
            </div>
        </div>
        <div class="col-md-7">
            <h1 class="font-bold text-orange-1000 text-5xl mb-2">{{ $product->name }}</h1>
            <h3 class="text-lg mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
            <p class="mb-8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt nesciunt tempore reiciendis ipsa possimus sequi. Asperiores quos quam tempore delectus magnam itaque libero quisquam, dolorum illo. Architecto et voluptates recusandae ullam debitis. Sapiente minima ratione molestiae animi porro, nobis repudiandae!</p>
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg mb-4">Choose size S-M-L-XL</h3>
                </div>
                <div class="flex">
                    <h3 class="text-lg mb-4 mr-2">Choose Quantity</h3>
                    <div>
                        <button class="focus:outline-none ml-2 mr-2" @click="add">+</button>
                            <span v-model="count" class="text-orange-1000 font-bold">@{{ count }} </span>
                        <button class="focus:outline-none ml-2 mr-2" @click="remove">-</button>
                    </div>
                </div>
            </div>
                 <div class="flex justify-between ">
                <h1 class="font-bold text-lg ">Price 122$</h1>
                  <div>
                      
                  <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                          <input name="name" value="{{ $product->name}} " type="hidden">
                          <input name="price" value="{{ $product->price }} " type="hidden">
                          <input name="id" value="{{ $product->id }} " type="hidden">
                          <input name="quantity" value="1" type="hidden">
                         <button type="submit" class="text-white rounded-full px-4 py-2 bg-orange-1000 focus:outline-none">Order Now</button>
                      </form>
                  </div>
                 </div>
         </div>
    </div>    
</div>    
</div>    

<div class="container">
    <div class="text-center mt-16 mb-16">
            <h1 class="text-3xl our-color font-bold mr-2 mb-4">Related<span class="text-3xl text-dark ml-2 font-bold">Products</span></h1>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, libero!</h3>
    </div>
    <div class="row mb-16">
        @foreach ($mightAlsoLike as $mightAlsoLike)
        <div class="col-md-3">
            <product link=" {{ url('product/'.$mightAlsoLike->id)}} " price="{{ $mightAlsoLike->price }}" title="{{$mightAlsoLike->name}}" image="{{ asset('images/cos.png')}}"></product>
        </div>
        @endforeach
        
    </div>
    <mail/>
</div> 
@endsection