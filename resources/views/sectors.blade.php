@extends('layouts.master')

@section('content')

<div class="col">
  <form action="{{route('export')}}" method="get" id="form1">
    @csrf
    <div class="card table-card">
      <div class="card-header">
        <h5>Select sector</h5>
        <div class="card-header-right">
          <div class="btn-group card-option">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="feather icon-more-horizontal"></i>
            </button>
          <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
              <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
              <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
              <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
              <li class="dropdown-item"><a href="javascript:;" onclick="document.getElementById('form1').submit();"><i class="feather icon-file-text"></i> Export</a></li>
          </ul>
          </div>
        </div>
        <div class="row">
            <div class="col">
                <select class="selectpicker form-control" id="select_done" name="sel_done" data-container="body" data-live-search="true">
                  <option value=" ">All</option> 
                    @foreach ($sectors as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option> 
                    @endforeach
                 </select> 
            </div>
            <div class="col">
                <label for="otdateinput"> from</label>
                <input type="date" id="otdateinput" name="otdata">
                <label for="dodateinput"> to</label>
                <input type="date" id="dodateinput" name="dodata">
                <button type="button" class="btn btn-primary" id="dates"><i class="mr-2 bi bi-funnel"></i>Filter</button>
            </div>
        </div> 
      </div>
      <div class="card-body p-0">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="table-responsive">
                    <div class="customer-scroll">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th><span>Sectors</span></th>
                                    <th><span>Temprature <a class="help"></a></span></th>
                                    <th><span>Date <a class="help"></a></span></th>
                                    <th><span>Time<a class="help"></a></span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sectors as $temp)
                                    <tr>
                                        <td><strong>{{ $temp->okolotka($temp->okolotok_id) }}</strong></td>
                                        <td>{{ $temp->temp }} °C </td>
                                        <td>{{ $temp->updated_at->format('Y-m-d') }} </td>
                                        <td>{{ $temp->updated_at->format('H:i:s') }} </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </div>
  </div>
  <nav aria-label="Page navigation example text-center">
    <ul class="pagination">
      
    </ul>
  </nav>
  @endsection

  @section('after_scripts')
  <script>  
      let debounce = null;
      $( "#dates" ).click(function(){
              clearTimeout(debounce);
              debounce = setTimeout(() => {
                let s = $('#otdateinput').val();
                let a = $('#dodateinput').val();
                let q = $('#select_done').val();
                $.get("{{ route('main') }}?s=" + s + "&a=" + a + "&q=" + q, function (response) {
                  $('#includes_table').html(response);
                });
              }, 500);
        });
  </script>
      
  @endsection