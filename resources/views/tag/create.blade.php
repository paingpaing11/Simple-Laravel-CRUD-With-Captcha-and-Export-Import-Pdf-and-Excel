@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{route('tag.store')}}" method="post" enctype="multipart/form-data" class="text-success ">
                @csrf
                <h1 class="text-center text-danger p-3 m-3">Please Fill Employee Form!</h1>
                <div class="form-group p-2">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') border border-danger @enderror"/ placeholder="Enter Your Name">
                    @error('name')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') border border-danger @enderror" placeholder="Enter Your Email"/>
                    @error('email')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Phone</label>
                    <input type="tel" name="phone" value="{{old('phone')}}" class="form-control @error('phone') border border-danger @enderror" placeholder="Enter Your Phone"/>
                    @error('phone')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">NRC</label>
                    <input type="text" name="nrc" value="{{old('nrc')}}" class="form-control @error('nrc') border border-danger @enderror" placeholder="Enter Your NRC"/>
                    @error('nrc')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Image</label>
                    <input type="file" accept="image/*" value="{{old('image')}}" onchange="loadFile(event)" name="image" class="@error('image') border border-danger @enderror" placeholder="Fill Your Image"/>
                    <img id="output" height="120px" width="120px"/>
                    @error('image')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') border border-danger @enderror" placeholder="Enter Your Title"/>
                    @error('title')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Department</label>
                    <input type="text" name="department" value="{{old('department')}}" class="form-control @error('department') border border-danger @enderror" placeholder="Enter Your Department"/>
                    {{-- <!-- Default inline 1-->
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="defaultInline1">
                        <label class="custom-control-label me-4" for="defaultInline1">1</label>
                    <!-- Default inline 2-->
                        <input type="checkbox" class="custom-control-input" id="defaultInline2">
                        <label class="custom-control-label me-4" for="defaultInline2">2</label>
                    <!-- Default inline 3-->
                        <input type="checkbox" class="custom-control-input" id="defaultInline3">
                        <label class="custom-control-label" for="defaultInline3">3</label>
                    </div> --}}
                    @error('department')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="" class="me-5">Status</label>
                    <input type="radio" name="status" class="me-3" value="active"/>Active
                    <input type="radio" name="status" class="me-3" value="non-active"/>Non-Active
                    @error('status')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Position</label>
                    <input type="text" name="position" value="{{old('position')}}" class="form-control @error('position') border border-danger @enderror" placeholder="Enter Your Position"/>
                    @error('position')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Create" class="btn btn-md btn-info m-1"/>
                    <a href="{{route('tag.index')}}">
                        <button type="button" class="btn btn-md btn-danger m-1">Cancel</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

        <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
        </script>

@endsection
