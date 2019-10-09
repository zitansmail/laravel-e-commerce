@extends('layouts.app')
@section('content')
<div class="image flex items-center ">
    <div class="container">
       <div class="row">
           <div class="col-md-1">
               <span class="border-l-8 border-orange-600 "></span>
           </div>
           <div class="col-md-8">
                <h1 class="font-extrabold our-color text-5xl">LARAVEL E-COMMERCE</h1>
                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam expedita explicabo quidem praesentium rem vel rerum voluptatem. Et, dolores veritatis!</p>
           </div>
       </div>
    </div>
</div>
{{-- ENd Of Content  --}}
{{-- Start Of New Arrivals --}}

<div class="container mt-8 mb-8">
    <div class="text-center">
            <h1 class="text-3xl our-color font-bold mr-2 mb-4">NEW<span class="text-3xl text-dark ml-2 font-bold">ARRIVALS</span></h1>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, libero!</h3>
    </div>
    
</div>
        <div class="container">
            
            <div class="row" >
                @foreach ($products as $product)
                <div class="col-md-3 mb-2">
                    
                    <product link="{{ url('product/'.$product->id) }}"  price=" {{ $product->price}} " title="{{ $product->name }}" image="{{ asset('images/cos.png')}}"></product>
                </div>   
                @endforeach
            </div>
        </div>
{{-- ENd Of New Arrivals --}} 

{{-- Start Best Sales --}}

<div class="container mt-8 mb-8">
    <div class="text-center">
            <h1 class="text-3xl our-color font-bold mr-2 mb-4">BEST<span class="text-3xl text-dark ml-2 font-bold">SALES</span></h1>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, libero!</h3>
    </div>   
    <div class="row mt-4 mb-8">
        <div class="col-md-4 mb-2">
            <div class="bg-white flex  px-2 py-2 text-lg font-semibold ">
                <div>
                    <img  class=" w-20 h-20"src="{{ asset('images/cos.png')}} " alt="">
                </div>
                <div class="flex items-center">
                   <div>
                         <h3 class="text-xs">Lorem ipsum dolor sit amet.</h3>
                         <h3 class="text-xs">Lorem ipsum dolor sit amet.</h3>
                   </div>
                </div>
            </div>
        </div>
           <div class="col-md-4 mb-2">
            <div class="bg-white flex  px-2 py-2 text-lg font-semibold ">
                <div>
                    <img  class=" w-20 h-20"src="{{ asset('images/cos.png')}} " alt="">
                </div>
                <div class="flex items-center">
                   <div>
                         <h3 class="text-xs">Lorem ipsum dolor sit amet.</h3>
                         <h3 class="text-xs">Lorem ipsum dolor sit amet.</h3>
                   </div>
                </div>
            </div>
        </div>
           <div class="col-md-4 mb-2">
            <div class="bg-white flex  px-2 py-2 text-lg font-semibold ">
                <div>
                    <img  class=" w-20 h-20"src="{{ asset('images/cos.png')}} " alt="">
                </div>
                <div class="flex items-center">
                   <div>
                         <h3 class="text-xs">Lorem ipsum dolor sit amet.</h3>
                         <h3 class="text-xs">Lorem ipsum dolor sit amet.</h3>
                   </div>
                </div>
            </div>
        </div>
    </div>
   </div>  
    {{-- END OF BEST SALES --}}

    {{-- START OF MAIL SECTION --}}
    <div class="container">
       <mail/>
    </div>
    {{-- END OF MAIL SECTION--}}
    

    
    
    




    
@endsection
