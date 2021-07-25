@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
    
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error')}}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success')}}
        </div>
    @endif
        <div class="card">
            <div class="card-header">{{ __('Verification OTP') }}</div><div class="card-body">
                <form method="post" action="{{route('postveriftoken')}}">
                    @csrf 

                    <div class="form-group row">
                        <label for="token" class="col-md-4 col-form-label text-md-right">{{ __('Code_OTP')}}</label>
                        <div class="col-md-6">
                            <input type="text" name="activation_token" id="activation_token" required autocomplete="activation_token" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror



                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6  offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{__('submit')}}
                        </button>
                        </div>
                    </div>
                
                </form>
            
            
            </div>
        </div>
    </div>
    </div>
</div>
@endsection