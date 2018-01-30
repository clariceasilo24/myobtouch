@extends('layouts.admin')
@section('title', 'My Record')

@section('body')

  <section id="contact" style="padding-top: 200px !important;padding-botton: 150px !important;" class="bg-white">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>  Appointments <button class="btn btn-success pull-right request-data-btn">Request an Appointment</button></h2>
        </div>
      </div>

              @php 
                $t_apts = \App\Appointment::where('patient_id', Auth::user()->patient->id)
                                           ->where('date_time', '=', date('Y-m-d'))
                                           ->get();
                $u_apts = \App\Appointment::where('patient_id', Auth::user()->patient->id)
                                           ->where('date_time', '>', date('Y-m-d'))
                                           ->get();
                $p_apts = \App\Appointment::where('patient_id', Auth::user()->patient->id)
                                           ->where('date_time', '<', date('Y-m-d'))
                                           ->get();
              @endphp
      <div class="container">
        <div class="row">

          <div class="col-lg-6">
            <div class="panel panel-success">
              <div class="panel-heading"><b>Today's Appointments</b></div>
              <div class="panel-body">
                <table class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($t_apts as $t_apt)
                      <tr>
                        <td>{{ date('M d, Y', strtotime($t_apt->date_time)) }}</td>
                        <td>{{ date('H:i A', strtotime($t_apt->timeslot->from)).'-'.date('H:i A', strtotime($t_apt->timeslot->to)) }}</td>
                        <td>
                          @php
                            $t_class = '';
                          @endphp
                          @if($t_apt->status == 'pending')
                          @php
                            $t_class = 'warning';
                          @endphp
                          @elseif($t_apt->status == 'approved')
                          @php
                            $t_class = 'info';
                          @endphp
                          @elseif($t_apt->status == 'served')
                          @php
                            $t_class = 'success';
                          @endphp
                          @elseif($t_apt->status == 'canceled')
                            @php
                              $t_class = 'danger';
                            @endphp
                          @endif
                          <span class="label badge-pill label-{{$t_class}}">{{ $t_apt->status }}</span>
                        </td>
                      </tr>
                    @empty
                    <tr><td rowspan="3">No data found.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading"><b>Upcoming Appointments</b></div>
              <div class="panel-body">
                <table class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($u_apts as $u_apt)
                      <tr>
                        <td>{{ date('M d, Y', strtotime($u_apt->date_time)) }}</td>
                        <td>{{ date('H:i A', strtotime($u_apt->timeslot->from)).'-'.date('H:i A', strtotime($u_apt->timeslot->to)) }}</td>
                        <td>
                          @php
                            $u_class = '';
                          @endphp
                          @if($u_apt->status == 'pending')
                          @php
                            $u_class = 'warning';
                          @endphp
                          @elseif($u_apt->status == 'approved')
                          @php
                            $u_class = 'info';
                          @endphp
                          @elseif($u_apt->status == 'served')
                          @php
                            $u_class = 'success';
                          @endphp
                          @elseif($u_apt->status == 'canceled')
                            @php
                              $u_class = 'danger';
                            @endphp
                          @endif
                          <span class="label badge-pill label-{{$u_class}}">{{ $u_apt->status }}</span>
                        </td>
                      </tr>
                    @empty
                    <tr><td rowspan="3">No data found.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading"><b>Past Appointments</b></div>
              <div class="panel-body">
                <table class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($p_apts as $p_apt)
                      <tr>
                        <td>{{ date('M d, Y', strtotime($p_apt->date_time)) }}</td>
                        <td>{{ date('H:i A', strtotime($p_apt->timeslot->from)).'-'.date('H:i A', strtotime($p_apt->timeslot->to)) }}</td>
                        <td>
                          @php
                            $p_class = '';
                          @endphp
                          @if($p_apt->status == 'pending')
                          @php
                            $p_class = 'warning';
                          @endphp
                          @elseif($p_apt->status == 'approved')
                          @php
                            $p_class = 'info';
                          @endphp
                          @elseif($p_apt->status == 'served')
                          @php
                            $p_class = 'success';
                          @endphp
                          @elseif($p_apt->status == 'canceled')
                            @php
                              $p_class = 'danger';
                            @endphp
                          @endif
                          <span class="label badge-pill label-{{$p_class}}">{{ $p_apt->status }}</span>
                        </td>
                      </tr>
                    @empty
                    <tr><td rowspan="3">No data found.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
      </div>

      
    </section><!-- #contact -->

  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="editmodal"></div>
    <!-- Core JavaScript Files -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/wow.min.js')}}"></script>
  <script src="{{asset('js/jquery.scrollTo.js')}}"></script>
  <script src="{{asset('js/jquery.appear.js')}}"></script>
  <script src="{{asset('js/stellar.js')}}"></script>
  <script src="{{asset('plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/nivo-lightbox.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script type="text/javascript">
  
        $(document).off('click','.request-data-btn').on('click','.request-data-btn', function(e){
          e.preventDefault();
          var that = this; 
          $("#editmodal").html('');
          $("#editmodal").modal();
          $.ajax({
            url: '/patients/request_apt_form',         
            success: function(data) {
              $("#editmodal").html(data);
            }
          }); 
        });

</script>
@endsection
