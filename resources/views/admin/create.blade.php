@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 style="font-weight: bold; font-size: 2em;">Add New Admin</h1>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('/laravel/php/admin/store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="admin_name">Admin Name</label>
                <input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="Enter Admin Name" required>
            </div>
            <div class="form-group">
                <label for="admin_email">Admin Email</label>
                <input type="email" name="admin_email" class="form-control" id="admin_email" placeholder="Enter Admin Email" required>
            </div>
            <div class="form-group">
                <label for="admin_password">Admin Password</label>
                <input type="password" name="admin_password" class="form-control" id="admin_password" placeholder="Enter Admin Password" required>
            </div>
            <div class="form-group">
                <label for="admin_phone">Admin Phone</label>
                <input type="text" name="admin_phone" class="form-control" id="admin_phone" placeholder="Enter Admin Phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Admin</button>
        </form>
    </div>
</div>
@endsection
