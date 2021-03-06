<section class="content-header">
    <h1>Testimoni User</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-quote-left"></i>Testimoni User</li>
    </ol>
</section>

<section class="content">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
            <a href="{{url('testimonies/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>create New</a>
        </div>
     </div>
</div>
<div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No </th>
                <th>Name </th>
                <th>Job Role </th>
                <th>Images </th>
                <th>status </th>
                <th>Description </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonies as $number => $testi)
            <tr>
                <td>{{$number+1}}</td>
                <td>{{$testi->name}}</td>
                <td>{{$testi->jobrole}}</td>
                <td>
                    {{-- images dapet dr model function --}}
                      @if (is_null($testi->images))
                        <label> - </label>
                      @else
                        <img class="img-rounded zoom" src="{{asset('images')}}/{{$testi->images}}" width="50">
                      @endif
                </td>
                <td>
                    <center>
                        @if ($testi->active)
                             <span class="label label-success">Actice</span>
                         @else
                            <span class="label label-danger">Inactive</span>
                        @endif
                    </center>        
                </td>
                <td>{{$testi->description}}</td>
                <td>
                    <center>
                        <a href="{{url('/testimonies/update/'.$testi->idtestimonies)}}"><i class="fa fa-pencil-square-o"></i></a>
                    </center>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</section>     