@extends('frontend.layoutother')

@section('content')
<div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1>
                                <span> <a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home'); ?></a> / <?php echo trans('frontend.Agents'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
			

<section class="content_info">
                <div class="container">
                    <!-- Newsletter Box -->                  
                    @include('newslatter')
                   

       
                    <!-- Teams Members-->
                    <div class="row padding_top_mini">
                         <div class="titles">
                                 <h1><?php echo trans('frontend.Agents'); ?></h1>
                            </div>
                            
				<?php
					foreach ($agents as $agent) :
						$photo = url("assets/images/profile/" . $agent->id . ".jpg");
						if (!@getimagesize($photo)) {
							$photo = url("assets/avatars/profile-pic.jpg");
						}
						?>
                        <!-- Item Team-->
                       <div class="col-md-3 text-center" style="min-height:380px">
            <div class="thumbnail">
                <img alt="" class="img-circle img-responsive" style="max-width:160px; padding:5px;" src="<?php echo $photo; ?>" alt="">
                                 <div class="caption">
                    <h3> <a href="<?php echo url("agent/properties/" . $agent->id . "/" . clean($agent->name)); ?>"> {{$agent->name}} </a> </h3>
                    <small class="text-center">  {{$agent->email}} </small> <br>
                    <small>  {{$agent->phone}} </small>
                    <ul class="list-inline">
                        <li><a href="{{$agent->facebook}}"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>

                        <li><a href="{{$agent->twitter}}"><i class="fa fa-2x fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>

                            </div>
                        </div>
                        <!-- End Item Team-->
						<?php endforeach; ?>

                       
                    </div>
                    <!-- End Teams Members-->
                </div>
            </section>
            <!-- End content info-->
			


    <?php

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    ?>



@endsection
