<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Data</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 2px;
        }
    </style>
</head>
<body>
    <h1 align="center">Employee List</h1>
    <table>
        <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Profile</th>
            <th>Name & Email</th>
            <th>NRC</th>
            <th>Phone</th>
            <th>Title</th>
            <th>Department</th>
            <th>Status</th>
            <th>Position</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td>
            <div class="d-flex align-items-center">
                {{-- <img
                    src="{{$tag->image}}"
                    alt="Image"
                    style="width: 75px; height: 75px"
                    class="rounded-circle"
                    /> --}}
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public'.$tag->image))); ?>" width="90px" height="80px">
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
            {{-- <td>
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
            </td> --}}
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
