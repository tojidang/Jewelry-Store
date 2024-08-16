@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 style="font-weight: bold; font-size: 2em;">List of Admins</h1>
    </div>
    <div class="panel-body">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->admin_id }}</td>
                    <td>{{ $admin->admin_name }}</td>
                    <td>{{ $admin->admin_email }}</td>
                    <td>{{ $admin->admin_phone }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->admin_id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('admin.delete', $admin->admin_id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <body>
                <tr>
                    <td>
                        <a href="{{ URL::to('laravel/php/admin/create') }}" class="btn btn-success mb-3" style="background-color: #007bff; border-color: #007bff;">Create New Admin</a>
                    </td>
                </tr>
            </body>
        </table>
    </div>
</div>
@endsection
