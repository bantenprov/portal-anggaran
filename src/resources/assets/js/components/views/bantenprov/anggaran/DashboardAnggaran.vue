<template>
  <div>

    <div class="row">
      <div class="col-lg-6 mb-3">
        <div class="card h-100" style="color: #fff; background-color: #2196F3;">
          <div class="card-body">
            <anggaran-realisasi-apbd-bar></anggaran-realisasi-apbd-bar>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /col -->
      <div class="col-lg-6 mb-3">
        <div class="card h-100" style="color: #fff; background-color: #4CAF50;">
          <div class="card-body">
            <anggaran-realisasi-apbn-pie></anggaran-realisasi-apbn-pie>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /col -->
    </div><!-- /.row -->

    <!-- ===================================================================== -->

    <div class="row">
      <div class="col-lg-8 mb-3">
        <div class="card h-100" style="color: #fff; background-color: #009688;">
          <div class="card-header">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            Anggaran dan Realisasi APBD 2017
          </div>
          <div class="card-body">
            <anggaran-bar-01></anggaran-bar-01>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /col -->
      <div class="col-lg-4 mb-3">
        <div class="card h-100" style="color: #fff; background-color: #FF9800;">
          <div class="card-header">
            <i class="fa fa-pie-chart" aria-hidden="true"></i>
            Anggaran dan Realisasi APBN 2017
          </div>
          <div class="card-body">
            <anggaran-pie-01></anggaran-pie-01>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /col -->
    </div><!-- /.row -->

    <!-- ===================================================================== -->

    <div class="row">
      <div class="col-lg-6 mb-3">
        <div class="card h-100" style="color: #fff; background-color: #F44336;">
          <div class="card-header">
            <i class="fa fa-pie-chart" aria-hidden="true"></i>
            Anggaran dan Realisasi APBN 2017
          </div>
          <div class="card-body">
            <anggaran-pie-02></anggaran-pie-02>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
      <div class="col-lg-6 mb-3">
        <div class="card text-white bg-dark h-100">
          <div class="card-header">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            Anggaran dan Realisasi APBD 2017
          </div>
          <div class="card-body">
            <anggaran-bar-02></anggaran-bar-02>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /col -->
    </div><!-- /.row -->

  </div>
</template>
