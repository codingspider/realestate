@extends('frontend.layoutother')

@section('content')

<div class="row">

<div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            
                        </div>     
                    </div>
                </div>            
            </div>

    <div class="content_info">
        <div class="title"><img src="{{url('assets/frontend/notfound.png')}}">  Page Not Found</div>
    </div>



</div>

<style> 
    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 40px;
        margin-top: 20px;
        margin-bottom: 390px;
    }
</style>

@endsection
