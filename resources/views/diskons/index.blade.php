<section class="content-header">
    <h1>Discounts</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-tag"></i>Discounts</li>
    </ol>
</section>

<section class="content">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
            <a href="{{url('diskons/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>create New</a>
        </div>
     </div>
</div>
<div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Images</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status </th>
                <th>Description </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diskons as $number => $diskon)
            <tr>
                <td>{{$number+1}}</td>
                <td>{{$diskon->name}}</td>
                <td>
                    {{-- images dapet dr model function --}}
                      @if (is_null($diskon->images))
                        <label> - </label>
                      @else
                        <img class="img-rounded zoom" src="{{asset('images/diskons')}}/{{$diskon->images}}" width="50">
                      @endif
                </td>
                <td>{{date('d M Y' , strtotime($diskon->start_date))}}</td>
                <td>{{date('d M Y' , strtotime($diskon->end_date))}}</td>
                <td>
                    <center>
                        @if ($diskon->active)
                             <span class="label label-success">Actice</span>
                         @else
                            <span class="label label-danger">Inactive</span>
                        @endif
                    </center>        
                </td>
                <td>{{$diskon->description}}</td>
                <td>
                    <center>
                        <a href="{{url('/diskons/update/'.$diskon->iddiskons)}}"><i class="fa fa-pencil-square-o"></i></a>
                    </center>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</section>     