<section class="content-header">
    <h1>Class</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-archive"></i>Class</li>
    </ol>
</section>

<section class="content">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
            <a href="{{url('classes/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>create New</a>
        </div>
     </div>
</div>
<div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Images</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $number => $class)
            <tr>
                <td>{{$number+1}}</td>
                <td>{{$class->name}}</td>
                <td>{{$class->categories->name}}</td>
                <td>
                    {{-- images dapet dr model function --}}
                      @if (is_null($class->images))
                        <label> - </label>
                      @else
                        <img class="img-rounded zoom" src="{{asset('images/class/images')}}/{{$class->images}}" width="50">
                      @endif
                </td>
                <td>
                    <center>
                        <a href="{{url('/classes/update/'.$class->idclass)}}"><i class="fa fa-pencil-square-o"></i></a>
                    </center>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</section>     