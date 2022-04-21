@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Mails From Customers</h1>
                <small>These mails are content us from customer panel.</small>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Contact Mails</li>
                </ol>
            </div>
        </div>
        <div class="card bg-light d-flex flex-fill p-3 mt-3 shadow-lg">
            <section class="content">
              <div class="container-fluid">
                <!-- Timelime example  -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->


                    <div class="timeline">
                        @foreach ($contacts as $contact)
                            
                      <div class="time-label">
                        <span class="bg-red">{{$contact->created_at->format('d M Y')}}</span>
                      </div>
                      <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"
                            ><i class="fas fa-clock"></i> {{$contact->created_at->diffForHumans()}}</span
                          >
                          <h3 class="timeline-header">
                            <!-- customer name here -->
                            <span class="text-info text-bold">{{$contact->name}}</span> sent you an message
                          </h3>
    
                          <div class="timeline-body">
                              <div class="mb-3">
                                <span class="text-info text-bold">Subject : {{$contact->subject}}</span> 
                              </div>
                            {{$contact->message}}
                          </div>
                          <div class="timeline-footer">
                            {{-- <a class="btn btn-primary btn-sm">Read more</a>
                            <a class="btn btn-danger btn-sm">Delete</a> --}}
                          </div>
                        </div>
                      </div>

                      
                      {{-- <div class="time-label">
                        <span class="bg-red">3 Jan. 2014</span>
                      </div>
                      <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"
                            ><i class="fas fa-clock"></i> 12:05</span
                          >
                          <h3 class="timeline-header">
                            <!-- customer name here -->
                            <a href="#">Support Team</a> sent you an email
                          </h3>
    
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy
                            zoodles, weebly ning heekya handango imeem plugg dopplr
                            jibjab, movity jajah plickers sifteo edmodo ifttt
                            zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu
                            weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-sm">Read more</a>
                            <a class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div> --}}
                      @endforeach

                </div>
              </div>
              <!-- /.timeline -->
            </section>
            <!-- /.content -->
            </div>
    </div>
</div>
    
</div>
@endsection