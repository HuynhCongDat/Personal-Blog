<div class="box-body-content">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>Name</td>
          <td>Email</td>
          <td>Role</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php $currentUser = auth()->user();?>
        @foreach($users as $user)

          <tr>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->roles->first()->display_name }}</td>
            <td>
             
                <a href="{{ route('users.edit', $user->id)}}" class="btn btn-xs btn-default">

                  <i class="fa fa-edit"></i>
                </a>
                @if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
                  <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                    <i class="fa fa-times"></i>
                  </button>
                @else
                  <a href="{{ route('backend.users.confirm', $user->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure? Delete item!!!')">
                    <i class="fa fa-times"></i>
                  </a>
                 @endif

            </td>
            
          </tr>

        @endforeach
      </tbody>
    </table>
  </div>