<div class="newsletter_box">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-8">
                                  <h3>
                                     <?php echo trans('frontend.Stay_Informed'); ?>
                                      <span>-  <?php echo trans('frontend.SIGN_UP_NEWSLETTER'); ?>.<span style="color:red" id="result-newsletter"></span> </span>
                                  </h3>                    
                                </div>
                                <div class="col-md-4">
                                   <form id="newsletterForm" action="">
                                        <input type="email" name="email" id="email_newsletter" placeholder=" <?php echo trans('frontend.Email'); ?>" required >
                                        <button class="register" id="newsletter_subscription" type="button"><i class="fa fa-angle-right"></i></button>
                                    </form> 
									
                                    
                                </div>
								
                            </div>
                        </div>
                    </div>
					
					
					<script type="text/javascript">
    $(function () {
        $("#newsletter_subscription").on("click", function () {
            var email = $("#email_newsletter").val();
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (email == '') {
                $("#result-newsletter").html('Email required');
                return false;
            } else if (re.test(email) == false) {
                $("#result-newsletter").html('Enter valid email address');
                return false;
            }
            var form_data = {
                email: email
            };
            $.ajax({
                type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                url: '<?php echo url("newsletter_subscription"); ?>',
                data: form_data,
                success: function (msg) {
                    $("#result-newsletter").html('<?php echo trans('frontend.Thank_You'); ?>');
                    document.getElementById("email_newsletter").disabled = true;
                }
            });
        });
    });

  
</script>