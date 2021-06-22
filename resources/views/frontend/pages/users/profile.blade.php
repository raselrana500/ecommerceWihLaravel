@extends('frontend.pages.users.master')
@section('sub-content')
<div class="container  mb-20">
    <h2>Update Your Profile information</h2>

    <hr>

    <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right mt-2">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" placeholder="Enter First Name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" placeholder="Enter Last Name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right mt-2">{{ __('UserName') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" placeholder="Enter Last Name" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Phone No') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" placeholder="Enter Phone Number" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ $user->phone_no }}" required>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="division_id" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Division') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="division_id">
                                    <option value="">Please select your Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>
                                            {{ $division->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district_id" class="col-md-4 col-form-label text-md-right mt-2">{{ __('District') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="district_id">
                                    <option value="">Please select your District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" {{ $user->district_id == $district->id ? 'selected' : '' }}>
                                            {{ $district->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right mt-2">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Enter your Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-md-4 col-form-label text-md-right mt-2">{{ __('Street Address') }}</label>

                            <div class="col-md-6">
                                <input id="street_address" type="text" placeholder="Enter Street Address" class="form-control{{ $errors->has('street_address') ? ' is-invalid' : '' }}" name="street_address" value="{{ $user->street_address }}" required>

                                @if ($errors->has('street_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right mt-2">{{ __('shipping Address(optional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" rows="4" placeholder="Enter shipping Address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address">{{ $user->shipping_address }}</textarea>

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right mt-2">{{ __('New Password(Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Enter Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                    </form>

</div>
@endsection