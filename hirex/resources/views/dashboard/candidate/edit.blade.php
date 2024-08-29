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
                            <h3 class="text-color text-center ">Update (Candidate`s name) Data</h3>
                        </div>

                        <div class="card-body">

                            <!-- Job Role -->
                            <div class="form-group mt-3">
                                <label for="skills" class="text-primary">Skills:</label>
                                <textarea name="skills" id="skills" class="form-control" style="height: 80px">{{ old('skills') }}</textarea>
                                @if ($errors->has('skills'))
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('skills') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Job Description -->
                            <div class="form-group mt-3">
                                <label for="description" class="text-primary">Description:</label>
                                <textarea name="description" id="description" class="form-control" style="height: 120px">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="text-danger mt-1">
                                        {{ $errors->first('description') }}
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