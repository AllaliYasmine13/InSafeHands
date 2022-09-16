<!-- dashboard inner -->
@extends("layouts.master")

@section("contenu")
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2><b style="font-weight:bold;">{{ userFullName() }}</b> Page Statistiques !</h2> 
        </div>
    </div>
</div>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">

 <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ variant-chart ] start -->
            <div class="col-md-6">
                <div class="card">
                    <div class="dash_head">
                        <h3>Basic line Statistiques</h3>
                    </div>
                    <div class="card-body">
                        <div id="line-chart-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="dash_head">
                        <h3>Area chart</h3>
                    </div>
                    <div class="card-body">
                        <div id="area-chart-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="dash_head">
                        <h3>Bar chart</h3>
                    </div>
                    <div class="card-body">
                        <div id="bar-chart-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="dash_head">
                        <h3>Bar chart stacked</h3>
                    </div>
                    <div class="card-body">
                        <div id="bar-chart-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="dash_head">
                        <h3>Pie Charts</h3>
                    </div>
                    <div class="card-body">
                        <div id="pie-chart-1" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="dash_head">
                        <h3>Pie Charts donut</h3>
                    </div>
                    <div class="card-body">
                        <div id="pie-chart-2" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <!-- [ variant-chart ] end -->

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
</div>
</div>

@endsection


