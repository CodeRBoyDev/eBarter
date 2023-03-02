<form action="{{route('admin.update',$id)}}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <button type="submit" title="active" style="border: none; background-color:transparent;">
                  <i class="fas fa-user-lock fa-lg text-primary"></i>
    </button> 
    <a href="{{route('admin.show',$id)}}" class='fas fa-eye'> </a>
</form>