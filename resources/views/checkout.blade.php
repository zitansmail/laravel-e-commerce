@extends('Layouts.app1')
@section('extra-css')
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('title')
CheckOut
@endsection
@section('content')
<div class="bg-white">
    <div class="container ">
      @forelse ($errors->all() as $error)
          <div class="alert alert-danger">
            {{ $error }}
          </div>
      @empty
          No error 
      @endforelse
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
        <div class="row mt-12">
            <div class="col-md-6">
                
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" >
                    @csrf
                    <div class="flex flex-col mb-2" >
                        <label for="">Email Adress</label>
                         <input name="email"type="text" class="bg-gray-100 px-2 border border-gray-900 focus:outline-none py-2">
                    </div>
                    <div class="flex flex-col mb-2" >
                        <label for="">Name</label>
                         <input name="name" type="text" class="bg-gray-100 px-2  border border-gray-900 focus:outline-none py-2">
                    </div>
                    <div class="flex flex-col mb-2" >
                        <label for="">Adress</label>
                         <input name="adress" type="text" class="bg-gray-100 px-2  border border-gray-900 focus:outline-none py-2">
                    </div>
                    <div>
                        <div class="row mb-2" >
                            <div class="col-md-6">
                               <div class="flex flex-col">
                                  <label for="">City</label>
                                  <input type="text" name="city" class="bg-gray-100 px-2  border border-gray-900 focus:outline-none py-2 ">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="flex flex-col">
                                  <label for="">Province</label>
                                  <input type="text" name="province" class="bg-gray-100 px-2  border border-gray-900 focus:outline-none py-2 ">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row mb-2" >
                            <div class="col-md-6">
                               <div class="flex flex-col">
                                  <label for="">Postal Code</label>
                                  <input type="text" name="codePostal" class="bg-gray-100 px-2 border border-gray-900  focus:outline-none py-2 ">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="flex flex-col">
                                  <label for="">Phone</label>
                                  <input type="text" name="phone" class="bg-gray-100 px-2 border border-gray-900  focus:outline-none py-2 ">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-lg font-bold">Payment Detaills</h2>
                    </div>
                    <div class="flex flex-col mb-2 mt-8" >
                        
                        <div class="form-group">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                        
                        <button type="submit" id="complete-order" class="bg-orange-1000 w-full rounded-lg py-3 focus:outline-none text-white font-bold">Complete Order</button>
                    </form>
                    </div>
                
                <div class="col-md-6">
                   <div class="px-4 py-4 border-gray-300 border-t-2 border-b-2  ">
                       @foreach (Cart::content() as $item)
                           
                       
                        <div class="flex justify-between mb-2 ">
                            <img src=" {{ asset('images/cos.png') }} " class=" w-16 mr-2" alt="">
                            <div class="flex flex-col">
                                <h1 class="text-lg">{{ $item->name }}</h1>
        
                                <h1 class="text-xs">{{ $item->price }} $</h1>
                            </div>
                            <div class="ml-2 flex items-center h-8 px-2 border-gray-900 border bg-white">
                                {{ $item->qty }}
                            </div>
                        </div>
                        @endforeach
                </div> {{-- End Of Products  // BOrder bottom --}}
                <div class="flex justify-between mt-2 px-4" >
                    <div>
                    <h1 class="text-sm mb-2">Subtotal : </h1>
                        <h1 class="text-sm mb-2">Tax : </h1>
                        <h1 class="text-sm mb-2">Coupon : </h1>
                        <h1 class="text-lg mb-2 font-bold mb-2">Total : </h1>
                    </div>
                    <div>
                        <h1 class="text-sm mb-2">${{ Cart::subtotal() }}</h1>
                        <h1 class="text-sm mb-2">${{ Cart::tax() }}</h1>
                        <h1 class="text-sm mb-2">${{ session()->get('key') ? session()->get('key') : 'No coupon applied' }}</h1>
                        <h1 class="text-lg font-bold mb-2">${{ Cart::total() - session()->get('key')  }}</h1>
                    </div>
                </div>

                <div class="mt-4 w-full ">
                <form action="{{ route('coupon.store') }}" method="post">
                    @csrf
                    <input name="coupon" type="text" class="border border-dark   px-2 py-2 text-dark w-3/5">
                    <button class="border border-dark px-8 py-2 font-bold inline-block hover:text-white hover:bg-black w-1/4">Apply</button>
                  </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    
@endsection

@section('extra-js')
    
    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });
            // Handle form submission
            var form=document.querySelector('#payment-form');
            console.log(form)
            form.addEventListener('submit', function(event) {
              event.preventDefault();
              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;
              /* var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              } */
              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });
            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);
              // Submit the form
              form.submit();
            
            }
  })();
  </script>
@endsection