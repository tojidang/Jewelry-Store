@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 style="font-weight: bold; font-size: 2em;">Edit Admin Information</h1>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('/laravel/php/admin/update/'.$admin->admin_id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="admin_name">Admin Name</label>
                <input type="text" name="admin_name" class="form-control" id="admin_name" value="{{ $admin->admin_name }}" required>
            </div>
            <div class="form-group">
                <label for="admin_email">Admin Email</label>
                <input type="email" name="admin_email" class="form-control" id="admin_email" value="{{ $admin->admin_email }}" required>
            </div>
            <div class="form-group">
                <label for="admin_password">Admin Password</label>
                <input type="password" name="admin_password" class="form-control" id="admin_password" placeholder="Leave blank to keep current password">
            </div>
            <div class="form-group">
                <label for="admin_phone">Admin Phone</label>
                <input type="text" name="admin_phone" class="form-control" id="admin_phone" value="{{ $admin->admin_phone }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>
</div>
@endsection
