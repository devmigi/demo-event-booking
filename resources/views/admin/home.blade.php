@extends('layouts.app')

@section('content')
<div class="container text-center">

    <h1 class="page-header font-weight-light text-center">Tickets Summary</h1>
    <table class="table table-dark">
        <tbody>
            <tr>
                <td>Self</td>
                <td><a class="btn btn-sm btn-primary" href="{!! url('admin/tickets/self') !!}">{!! $selfTicketsCount !!}</a></td>
            </tr>
            <tr>
                <td>Corporate</td>
                <td><a class="btn btn-sm btn-primary" href="{!! url('admin/tickets/corporate') !!}">{!! $corporateTicketsCount !!}</a></td>
            </tr>
            <tr>
                <td>Group</td>
                <td><a class="btn btn-sm btn-primary" href="{!! url('admin/tickets/group') !!}">{!! $groupTicketsCount !!}</a></td>
            </tr>
            <tr>
                <td>Others</td>
                <td><a class="btn btn-sm btn-primary" href="{!! url('admin/tickets/others') !!}">{!! $othersTicketsCount !!}</a></td>
            </tr>
        </tbody>
    </table>
    <br>

    <div id="piechart"></div>

</div>
@endsection


@section('page-script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Type', 'Number of registrations'],
                ['Self', {!! $selfTicketsCount !!}],
                ['Corporate', {!! $corporateTicketsCount !!}],
                ['Group', {!! $groupTicketsCount !!}],
                ['Others', {!! $othersTicketsCount !!}]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Total Registrations', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
@endsection