@extends('dashboard.layouts.app')
@section('content')
<div class="site-section" style="margin-top: 30px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="">
                    @csrf
                    <div class="card">
                        <div class="card-header " style="margin-bottom: 30px;" >
                            <h3 class="text-color text-center ">Update (Employer`s name) Data</h3>
                        </div>

                        <div class="card-body">

                                                    <!-- Compan` name -->
                                                    <div class="form-group mt-3">
                                <label for="c_name" class="text-primary">Company`s name:</label>
                                <input type="text" name="c_name" id="c_name" class="form-control" value="{{ old('c_name') }}">
                                @if ($errors->has('c_name'))
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('c_name') }}
                                    </div>
                                @endif
                            </div>

                                                        <!-- Company`s description -->
                                                        <div class="form-group mt-3">
                                <label for="c_desc" class="text-primary">Company`s description:</label>
                                <input type="text" name="c_desc" id="c_desc" class="form-control" value="{{ old('c_desc') }}">
                                @if ($errors->has('c_desc'))
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('c_desc') }}
                                    </div>
                                @endif
                            </div>

                                                        <!-- website -->
                                                        <div class="form-group mt-3">
                                <label for="website" class="text-primary">Company`s website:</label>
                                <input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
                                @if ($errors->has('website'))
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('website') }}
                                    </div>
                                @endif
                            </div>

                                                        <div class="form-group mt-3">
                                <label for="phone" class="text-primary">Phone:</label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>


                            <button type="submit" class="btn bg-color">Save Changes</button>

                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection