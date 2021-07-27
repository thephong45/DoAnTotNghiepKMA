@extends('layouts.student')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 style="padding-left: 250px;font-weight: bold">BẢNG DANH SÁCH CÁC USER</h2>
                <a href="{{ route('addUser') }}"><button class="btn btn-success" style="margin-bottom: 15px;">Add User</button></a>
                <table class="table table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th width="80px"></th>
                        <th width="80px"></th>
                    </tr>
                    @foreach ($userList as $item)
                        <tr id="r_{{ $item->id }}">
                            <td>{{ $index++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->format("d/m/Y")}}</td>
                            <td>{{\Carbon\Carbon::parse($item->updated_at)->format("d/m/Y")}}</td>

                            <td><a href="{{ route('editUser') }}?id={{ $item->id }}"><button class="btn btn-warning">Edit</button></a></td>
                            <td><button onclick="deleteUser({{ $item->id }})" class="btn btn-danger">Delete</button></td>
                        </tr>
                    @endforeach
                </table>
                {{ $userList->links() }}
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        function deleteUser(id) {
            $.post('{{ route('deleteUser') }}', {
                _token: '{{ csrf_token() }}',
                id:id
            }, function(data, status) {
                // location.reload();
                $('#r_'+id).remove();
            })
        }
    </script>
@stop
