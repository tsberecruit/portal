@extends('frontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Track Your Application Status</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Tracking System</a></li>
                            <li>Track Status</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">



<h1>Status Tracking</h1>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style type="text/css">
    body{ }
    .container{ }
    .card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #3BB77E}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #3BB77E;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #3BB77E;border-color: #3BB77E;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}

</style>

<div class="container">
    <article class="card">
        <header class="card-header"> My Status / Tracking </header>
        <div class="card-body">
            <h6>Job Application Process : {{-- $track->invoice_no --}} </h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Start Date:</strong> <br>{{-- $track->order_date --}}19 Feb 2025 </div>

     <div class="col"> <strong>Processing BY:</strong> <br> {{--$track->name --}}TSB E-recruit | <i class="fa fa-phone"></i>{{-- $track->phone --}}+91 234878938 / {{-- $track->division->division_name --}} Saudi Arabia / {{-- $track->district->district_name --}}Rhiyardh  </div>

     <div class="col"> <strong>Tracking ID:</strong> <br>{{-- $track->payment_method --}} 111</div>

     <div class="col"> <strong>End Date #:</strong> <br>${{-- $track->amount --}} 15 March 2025</div>
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Applied </span> </div>
                
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Shortlisted </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Interview </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Offer Letter </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Document Collection </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Visa Applied </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Visa Approved </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ticket issued </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Onboarding </span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Joined </span> </div>
            </div>
            
            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection
