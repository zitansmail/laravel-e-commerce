@extends('Layouts.app1')
@section('title')
Cart
@endsection
@section('content')
<div class="bg-white">
    <div class="container">
    <div class="row">
        <div class="col-md-8">
             @if (session()->has('success_message') )
            <div class="alert alert-success">
                {{ session()->get('success_message')}}
            </div>
              @endif
             @if (session()->has('error') )
            <div class="alert alert-danger">
                {{ session()->get('error')}}
            </div>
            @endif
        <div class="px-4 py-4 ">
            @foreach (Cart::content() as $item)
            <div class="flex justify-between mb-2 w-full">
                           <div>
                                <img src=" {{ asset('images/cos.png') }} " class=" w-16 mr-2" alt="">
                           </div>
                            <div class="flex flex-col">
                                <h1 class="text-lg">{{$item->name}}.</h1>
                                <h1 class="text-xs">Lorem ipsum dolor sit amet.</h1>
                                <h1 class="text-xs">133 $</h1>
                            </div>
                            <div>
                                <select data-row="{{ $item->rowId }}" class="opt" >
                                    <option {{ $item->qty == 1 ? 'selected' : ''}} >1</option>
                                    <option {{ $item->qty == 2 ? 'selected' : ''}} >2</option>
                                    <option {{ $item->qty == 3 ? 'selected' : ''}} >3</option>
                                    <option {{ $item->qty == 4 ? 'selected' : ''}} >4</option>
                                    <option {{ $item->qty == 5 ? 'selected' : ''}} >5</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <a href="{{ route('cart.remove',$item->rowId) }} ">Remove</a>
                                <a href="#">SaveForLater</a>
                            </div>
                            <div class="ml-2 flex items-center h-8 px-2 border-gray-900 border bg-white">
                                {{ $item->qty }}
                            </div>
                        </div>
            @endforeach
                        
                       
                </div> 
                </div>
    </div>
</div>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="bg-gray-200 py-4 px-4 text-dark">
    <div class="flex justify-between ">
        <div class="w-1/2">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, voluptatem.
        </div>
        <div class="flex flex-col">
            <h1 class="text-sm font-semibold mb-2">Tax :  ${{ Cart::tax()}}</h1>
            <h1 class="text-sm font-semibold mb-2">Subtotal : ${{ Cart::subtotal()}}</h1>
            <h1 class="text-lg font-bold ">Total : ${{ Cart::total()}}</h1>
        </div>
    </div>
</div>
        </div>
    </div>
    
       <div class="col-md-8 flex justify-between">
            <a href=" {{ route('products.index') }} "><button class="bg-orange-1000 text-sm font-semibold px-4 py-2 text-white mt-4">Continue Shopping</button>
</a>
        <a href="{{ route('checkout.index')}} "><button class="text-orange-1000 hover:bg-orange-1000 hover:text-white border border-red-400 text-sm font-semibold px-4 py-2 mt-4">Proced To Checkout</button>
</a>
       </div>
    
</div>
</div>


@endsection
    @section('extra-js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
     var results = document.querySelectorAll('.opt');
     console.log(results)
     results.forEach(function (option) {
         option.addEventListener('change',function (params) {
             alert('changed')
             const id = option.getAttribute('data-row');
             console.log(id)
             axios.patch(`cart/${id}`,{
                 quantity : this.value
             })
             .then(function(response) {
                 window.location.href = ' {{ route('cart.index')}} '
             })
             .catch(function(error) {
                 console.log(error)
             })
             
             
         })
         
     })
</script>

        
    @endsection

    