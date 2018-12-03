@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mesas
            {{-- <small>Control panel</small> --}}
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i> Mesas</a></li>
            
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <input type="hidden" id="token" value="{{csrf_token()}}">
                  <div class="col-md-4">
                      <div class="row">
                          <div class="col-md-12">
                              {!! $new !!}
                          </div>
                          <div class="col-md-12 div-edit">
                            {!! $edit !!}
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8">
                      {!! $show !!}
                  </div>
              <!-- .row -->
              </div>
        </section>
        <!-- /.content -->
      </div>
@endsection




