@extends('layouts.master')

@section('content')

<div class="col">
  <div class="card table-card">
    <div class="card-header">
      <h5>Statistics</h5>
      <div class="card-header-right">
        <div class="btn-group card-option">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="feather icon-more-horizontal"></i>
          </button>
        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-file-text"></i> Export</a></li>
        </ul>
        </div>
      </div>
      <div class="row">
          <div class="col">
              <label for="otdateinput">Select Date</label>
              <input type="date" id="dateinput" value="" required>
              <button type="button" class="btn btn-primary" id="dates" disabled><i class="mr-2 bi bi-graph-up"></i>Preview</button>
          </div>
      </div> 

    </div>

      <div class="col">
        <div class="card">
                <div class="card-header">
                     <h5>Unique Visitor</h5>
                </div>
                <div class="card-body pl-0 pb-0">
                    <div id="nimadir-chart"> 
    
                    </div>
            </div>
        </div>
    </div>
    

  </div>
</div>
@endsection

@section('after_scripts')
<script>
    let series = [
        @foreach($series as $key => $seria)
        {       
            name : ['{{ $okolotki[$key] }}'],
            data:  [{{ implode(',', $seria) }}]
        },
        @endforeach
    ];
     var options = {
          series: series,
          chart: {height: 400, type: 'line', toolbar: {show: false,},},
          dataLabels: {enabled: false},
        stroke: {width: 2, curve: 'smooth'},
        colors: ['#007ACC', '#F47D01', '#19E6A0', '#C6EEF4','#FF575A','#FCBA39','#8B5DC3','#0D3DCC','#1B4671','#F4EA26','#F42BC2','#4DF405'],
        dataLabels: {
          enabled: true,
        },

        title: {
          align: 'left'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
    
        xaxis: {
          categories: [{!! implode(',', $categories) !!}],
          title: {
            text: 'Sectors'
          }
        },
        yaxis: {
          title: {
            text: 'Temperature'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#nimadir-chart"), options);
        chart.render();
</script>
<script>
  let debounce = null;
      $( "#dates" ).click(function(){
              clearTimeout(debounce);
              debounce = setTimeout(() => {
                let s = $('#dateinput').val();
                $.get("{{ route('static') }}?s=" + s, function (response) {
                  $('#nimadir-chart').html(response);
                });
              }, 500);
        });
</script>
@endsection