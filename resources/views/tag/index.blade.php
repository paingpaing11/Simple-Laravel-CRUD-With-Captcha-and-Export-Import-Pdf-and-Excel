@extends('layout.master')

@section('content')
    <div class="card-text p-3 m-3">
        <h2 class="text-lg-center p-1 m-1">List Of Employee</h2>
    </div>
    <center>
        @if(session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show float-right" role="alert" style="width: 22rem;">
                <i class="far fa-circle-check"></i>{{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </center>
        <a href="{{route('tag.create')}}" class="btn btn-success"><i class="fas fa-user-nurse">&nbsp; &nbsp;</i>New Employee</a>
        <div class="py-3 te" align="right">
            <a href="{{url('/export-tags')}}" class="btn btn-primary">Export PDF</a>
            <a href="{{route('tag.export')}}" class="btn btn-warning">Export Excel</a>
        </div>
        <div class="col-md-3">
            <form action="{{route('tag.import')}}" method="post" enctype="multipart/form-data">
            @csrf
                <input class="form-control" name="file" type="file" required/>
                <button type="submit" class="btn btn-success">Import Excel</button>
            </form>
        </div>
    <table class="table align-middle mb-0">
        <thead class="bg-light">
        <tr class="bg-success">
            <th>Profile</th>
            <th>Name & Email</th>
            <th>NRC</th>
            <th>Phone</th>
            <th>Title</th>
            <th>Department</th>
            <th>Status</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td>
            <div class="d-flex align-items-center">
                <img
                    src="{{$tag->image}}"
                    alt="Image"
                    style="width: 75px; height: 75px"
                    class="rounded-circle"
                    />
            </div>
            <td>
                <p class="fw-bold mb-1">{{$tag->name}}</p>
                <p class="text-muted mb-0">{{$tag->email}}</p>
            </td>
            <td>
                <p class="fw-normal mb-1">{{$tag->nrc}}</p>
            </td>
            <td>
                <p class="fw-normal mb-1">{{$tag->phone}}</p>
            </td>
            </td>
            <td>
                <p class="fw-normal mb-1">{{$tag->title}}</p>
            </td>
            <td>
                <p class="text-muted mb-0">{{$tag->department}}</p>
            </td>
            <td>{{$tag->position}}</td>
            <td>
                @if ($tag->status === 'active')
                    <span class="badge bg-success btn btn-info rounded-pill d-inline">{{$tag->status}}</span>
                @elseif ($tag->status === 'non-active')
                    <span class="badge bg-danger btn btn-danger rounded-pill d-inline">{{$tag->status}}</span>
                @endif
            </td>
            <td>
                <form action="{{route('tag.destroy', $tag->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="{{route('tag.show', $tag->id)}}">
                        <button type="button" class="btn btn-outline-info btn-sm rounded-pill">
                        Show
                        </button>
                    </a>
                    <a href="{{route('tag.edit', $tag->id)}}">
                        <button type="button" class="btn btn-outline-warning btn-sm rounded-pill">
                        Edit
                        </button>
                    </a>
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Are You Sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center p-5 m-5">
        {!! $tags->links() !!}
    </div>
@endsection
