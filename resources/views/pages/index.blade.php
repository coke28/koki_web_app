<x-base-layout>

  {{-- <div class="card-group card-group-gap-5">
    {{ theme()->getView('partials/widgets/mixed/_widget-2', array('class' => 'card-xxl-stretch', 'chartCcolor' =>
    'primary', 'chartHeight' => '200px')) }}
  </div> --}}
  <div class="card-group card-group-gap-5">
    <div class="card card-custom m-5 gutter-b rounded-card">
      <div class="card-header">
        <div class="card-title">
          <h2 class="card-label">
            System Overview
          </h2>
        </div>
      </div>
      <div class="card-body">
        {{-- <div id="harvest_per_month_chart_div"></div> --}}
        <table class="">
          <tr class="">
            <td><div id="harvest_per_month_chart_div"></div></td>
            <td><div id="harvest_per_year_chart_div" ></div></td>
          </tr>
          <tr class="">
            <td><div id="harvest_contribution_chart_div"></div></td>
            <td><div id="stock_contribution_chart_div" ></div></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="card-group card-group-gap-5">
    <table class="">
      <tr class="">
 
        <td><div id="harvest_per_building_chart_div"></div></td>
      </tr>
    </table>
    <table class="">
      <tr class="">
       
        <td><div id="stock_per_building_chart_div"></div></td>
      </tr>
    </table>
  </div>


   {{-- <div class="card-group card-group-gap-5">
    {{ theme()->getView('partials/widgets/mixed/_widget-7', array('class' => 'card-xxl-stretch-50 mb-5 mb-xl-8',
    'chartCcolor' => 'primary', 'chartHeight' => '150px')) }}
  </div>

  <div class="card-group card-group-gap-5">
    {{ theme()->getView('partials/widgets/mixed/_widget-10', array('class' => 'card-xxl-stretch-50 mb-5 mb-xl-8',
    'chartCcolor' => 'primary', 'chartHeight' => '175px')) }}
  </div> --}}

  <!--start::Include your modals here-->

  @section('scripts')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="{{ "/".'custom/dashboard/piechart.js?v='. rvndev()->getRandom(30) }}"></script>
    @endsection

    

    <!--start::Include your styles here-->
    @section(' styles') <style>
    .dataTables_wrapper .dataTables_filter {
          display: none;
        }
      </style>
    @endsection

</x-base-layout>