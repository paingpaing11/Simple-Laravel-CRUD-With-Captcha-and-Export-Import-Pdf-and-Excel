@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{route('tag.update', $tag->id)}}" method="post" enctype="multipart/form-data" class="text-success ">
                @csrf
                @method('put')
                <h1 class="text-center text-danger p-3 m-3">Please Fill Employee Form!</h1>
                <div class="form-group p-2">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$tag->name}}"class="form-control @error('name') border border-danger @enderror"/ placeholder="Enter Your Name">
                    @error('name')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{$tag->email}}" class="form-control @error('email') border border-danger @enderror" placeholder="Enter Your Email"/>
                    @error('email')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Phone</label>
                    <input type="tel" name="phone" value="{{$tag->phone}}" class="form-control @error('phone') border border-danger @enderror" placeholder="Enter Your Phone"/>
                    @error('phone')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">NRC</label>
                    <input type="text" name="nrc" value="{{$tag->nrc}}" class="form-control @error('nrc') border border-danger @enderror" placeholder="Enter Your NRC"/>
                    @error('nrc')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Image</label>
                    <input type="file" accept="image/*" onchange="loadFile(event)" name="image" class="@error('image') border border-danger @enderror"/>
                    @error('image')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                    <img src="{{asset($tag->image)}}" id="output" height="120px" width="120px" alt="Image"/>
                </div>
                <div class="form-group p-2">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$tag->title}}" class="form-control @error('title') border border-danger @enderror" placeholder="Enter Your Title"/>
                    @error('title')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Department</label>
                    <input type="text" name="department" value="{{$tag->department}}" class="form-control @error('department') border border-danger @enderror" placeholder="Enter Your Department"/>
                    @error('department')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="" class="me-5">Status</label>
                    <input type="radio" name="status" class="me-3" value="active"{{ $tag->status == 'active' ? 'checked' : ''}}/>Active
                    <input type="radio" name="status" class="me-3" value="non-active" {{ $tag->status == 'non-active' ? 'checked' : ''}}/>Non-Active
                    @error('status')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="">Position</label>
                    <input type="text" name="position" value="{{$tag->position}}" class="form-control @error('position') border border-danger @enderror" placeholder="Enter Your Position"/>
                    @error('position')
                        <small class="text-danger fst-italic">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Update" class="btn btn-md btn-info m-1"/>
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
