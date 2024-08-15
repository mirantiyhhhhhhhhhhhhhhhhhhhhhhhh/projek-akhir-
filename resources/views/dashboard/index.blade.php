@extends('layouts.index')
@section('content')
<div class="content-wrapper" style="padding-bottom: 30%">
  <div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
          <ul class="nav nav-tabs" role="tablist">
          </ul>
          <div>
          </div>
        </div>
        <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">  
            <div class="row">
              <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                <span class="badge badge-success"><h1>Absensi Guru SMP Negeri 43 Buru</h1></span>
              </div>
            </div>

              <div class="col-12 mb-3">
                {!! $setting->maps_setting !!}    
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection