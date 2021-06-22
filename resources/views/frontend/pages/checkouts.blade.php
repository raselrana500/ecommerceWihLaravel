@extends('frontend.layouts.master')
@section('content')
<div class="container card card-body mt-4">
    <div class="card card-body">
    
    <h2>Confirm items</h2>
                <hr>
        <div class="row">
            <div class="col-md-7 border-right">
                @foreach(App\Models\Cart::totalCarts() as $cart)
                    <p>{{ $cart->product->title }} - 
                    <strong>{{ $cart->product->price }} Taka</strong>
                    - {{ $cart->product_quantity }} item
                    
                    </p>
                @endforeach
            </div>
            <div class="col-md-5">
                @php 
                    $total_price = 0;
                @endphp
                @foreach(App\Models\Cart::totalCarts() as $cart)
                    @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                    @endphp                    
                @endforeach
                <p>Total Price : <strong>{{ $total_price }}</strong> Taka</p>
                <p>Shipping Cost : <strong>{{ App\Models\Setting::first()->shipping_cost }}</strong> Taka</p>
                <p>Total price with shipping cost : <strong>{{$total_price + App\Models\Setting::first()->shipping_cost}}</strong> Taka</p>

            </div>
        </div>

        <p>
            <a href="{{ route('carts') }}">Change Cart items</a>
        </p>
    </div>
    <div class="card card-body mt-4">
        <h2>Shipping Address</h2>
        <hr>
        <form method="POST" action="{{ route('checkouts.store') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Receiver Name(*)') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Enter Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Phone No(*)') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" placeholder="Enter Phone Number" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right mt-2">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Enter your Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="messege" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Additional Messege(Optional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="messege" rows="4" placeholder="Enter your Messege" class="form-control{{ $errors->has('messege') ? ' is-invalid' : '' }}" name="messege"></textarea>

                                @if ($errors->has('messege'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('messege') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right mt-2">{{ __('shipping Address(*)') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" rows="4" placeholder="Enter shipping Address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Select a payment Method(*)') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="payment_method_id" required id="payments">
                                    <option value="">Select a payment method</option>
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                                
                                @foreach($payments as $payment)
                                    @if($payment->short_name == "cash_in")
                                        <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 hidden text-center">
                                            <h3 style="color:red;">Cash On Delivery</h3>
                                            <hr style="border: 5px solid blue; border-radius: 5px;">
                                            <h4>
                                                For cash on delivery is nothing necessary.
                                                Just click 
                                                <strong>"Order Now"</strong>
                                                 button.
                                                <br>
                                                <small>
                                                    you will get your product in two or three business days.
                                                </small>
                                            </h4>
                                        </div>
                                        @else
                                        <div id="payment_{{ $payment->short_name }}" class="hidden text-center alert alert-success mt-2">
                                            <h3 style="color:red;"><strong>{{ $payment->name }}</strong> <small>Payment</small></h3>
                                            <hr style="border: 5px solid blue; border-radius: 5px;">
                                            <p>
                                                {{ $payment->name }} Number : <strong style="color:red;">{{$payment->no }}</strong>
                                                <br>
                                                Account Type: <strong style="color:blue;">{{ $payment->type }}</strong>
                                            </p>
                                            <div class="alert alert-success" style="color:blue;">
                                                Please send the <strong style="color:red;">above money</strong> 
                                                to this <strong style="color:red;">{{ $payment->name }} Number</strong> and 
                                                write your <strong style="color:red;">transaction id</strong> 
                                                below there. 
                                            </div>                                            
                                        </div>
                                    @endif
                                @endforeach
                                <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden"  placeholder="Please Enter your Transaction ID">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#payments').change(function(){
            $payment_method = $("#payments").val();
            if($payment_method == "cash_in"){
                $("#payment_cash_in").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#payment_nagad").addClass('hidden');
            }else if($payment_method == "bkash"){
                $("#payment_bkash").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#payment_nagad").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }else if($payment_method == "rocket"){
                $("#payment_rocket").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_nagad").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }else if($payment_method == "nagad"){
                $("#payment_nagad").removeClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }            
        })
    </script>
@endsection