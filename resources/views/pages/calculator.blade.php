@extends('frontend.layoutother')

@section('content')

<div class="section_title calculator">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1><?php echo trans('frontend.Gallery'); ?>
                                <span><a href="<?php echo url(""); ?>">Home </a> / Loan Amortization Calculator</span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
			
			
			
<!-- Intro Content -->
<section class="content_info">
                <div class="container">
				    @include('newslatter')
					
				<div class="titles">
                                 <h1>Loan Amortization Calculator</h1>
                            </div>
							
							
							<div class="row">

    <div class="col-md-6">
        <h4> Per month, you repay  : <strong > <span style="float:right" id="permonth"> 0 </span> </strong> </h4>
        <h4> Down Payment :<strong> <span style="float:right" id="downpament_a"> 0 </span> </strong> </h4>
        <h4> Total Amount :<strong> <span style="float:right" id="loanamount_total"> 0 </span> </strong> </h4>
        <h4> Total Interest :<strong> <span style="float:right" id="total_interest"> 0 </span> </strong> </h4>
        <h4> Total you'll repay :<strong> <span style="float:right" id="total_amount"> 0 </span> </strong> </h4>

        <div id="hightcart_container" style=""></div>
    </div>

    <div class="col-md-6">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <div class="form-group mamount"> 
            <label for="loanamount" class="col-md-12 control-label">Loan Amount</label>
            <div class="col-md-12">
                <div class="input-group"> 
                    <input type="number" value="250000" name="loanamount" id="loanamount" class="form-control">
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>

        <div class="form-group mamount"> 
            <label for="loanamount" class="col-md-12 control-label">Down Payment</label>
            <div class="col-md-12">
                <div class="input-group"> 
                    <input type="number" value="20" name="downpayment" id="downpayment" class="form-control">
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        </div>

        <div class="form-group mamount"> 
            <label for="loanamount" class="col-md-12 control-label">Interest</label>
            <div class="col-md-12">
                <div class="input-group"> 
                    <input type="number" value="5" name="loanintrest" id="loanintrest" class="form-control">
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        </div>

        <div class="form-group mamount"> 
            <label for="loanamount" class="col-md-12 control-label">Period</label>
            <div class="col-md-12">
                <div class="input-group"> 
                    <input type="number" value="5" name="period" id="period" class="form-control">
                    <span class="input-group-addon">Year</span>
                </div>
            </div>
        </div>



    </div>
	<br><br>
	 <div class="col-md-12">
		<table style="width:100%" id="printTable"> 
	<thead style="background:#DEEEFE;width:100%;"> 
	<tr style="width:100%"> 
		<td style=" width:25%; padding:6px">  # </td> 
		<td style=" width:20%" > Per/Month </td> 
		<td style=" width:20%" > Principle </td> 
		<td style=" width:20%" > Interest </td> 
		<td style=" width:20%"> Balance </td> 
	</tr>
	</thead>
	<tbody id="tbody"> 
	
	</tbody>
	<thead style="background:#DEEEFE;width:100%;"> 
	<tr style="width:100%"> 
		<td style=" width:25%; padding:6px">  # </td> 
		<td style=" width:20%" > Per/Month </td> 
		<td style=" width:20%" > Principle </td> 
		<td style=" width:20%" > Interest </td> 
		<td style=" width:20%"> Balance </td> 
	</tr>
	</thead>
	</table>
	 </div>


</div>
<script>

   function change() {
        var loanamount_total = $("#loanamount").val();
        var loanintrest = $("#loanintrest").val();
        var period = $("#period").val();
        var per_year = $("#per_year").val();
        var downpayment_percent = $("#downpayment").val();
        var downpayment = (Number(downpayment_percent) * Number(loanamount_total)) / 100;

        var loanamount = Number(loanamount_total) - Number(downpayment);
        var intrest = (loanintrest / 100) / 12;
		
	
		
        var permonth = calculate(loanamount , Number(period) * 12 );
		var total_amount = permonth * Number(period) * 12;
        
		var total_intrest =  total_amount - loanamount;
        $("#permonth").text("$" + permonth);
        $("#downpament_a").text("$" + downpayment.toFixed(2));
        $("#loanamount_total").text("$" + Number(loanamount_total).toFixed(2));
        $("#total_interest").text("$" + total_intrest.toFixed(2));
        $("#total_amount").text("$" + total_amount.toFixed(2));
		
		var total_intrest_percent = (Number(total_intrest) * 100) / Number(total_amount);
        var total_amount_precent = (Number(loanamount) * 100) / Number(total_amount);
		
		var left_amount = Number(total_amount);
		var loanamount_left = Number(loanamount);
		$( "#tbody" ).html("");
		for(var i=1; i <= Number(period) * 12; i++) { 
			var intrest_l = intrest * loanamount_left;
			left_amount = left_amount - permonth;
			var principle = permonth - intrest_l;
			loanamount_left = loanamount_left - principle;
				$( "#tbody" ).append( "<tr style='background-color: #FBFCFF;border-top: dotted #DEEEFE 1px;'><td style='padding:5px'> "+ i +" </td><td> $"+ permonth  +" </td> <td>$" + principle.toFixed(2) +" </td><td>$" + intrest_l.toFixed(2)  + "</td>  <td> $"+ left_amount.toFixed(2) +" </td></tr>" );
		}
		
		
		$('#hightcart_container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Loan Calculator Chart'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
					showInLegend : true
                }
            },
            series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                            name: 'Interest',
                            y: total_intrest_percent
                        }, {
                            name: 'Principle',
                            y: total_amount_precent,
                            sliced: true,
                            selected: true
                        }]
                }]
        });
		
    }
	
	
	

	

    $("body").on("keyup", "#downpayment , #loanintrest , #loanamount , #period, #per_year", function () {
        change();
    });

    $(function () {
        change();
    });
	
	
		function calculate(amount , term)
		{
			// Standard Mortgage Formula:
			// M = P[i(1+i)n] / [(1+i)n - 1]
			// x = (1+i)n

			var P = amount;
			var i = ($('#loanintrest').val().replace(/[^0-9\.]/g, '') / 100) / 12;
			var n = term;
			var x = Math.pow((1 + i ), n);
			var M = ( P * ((i * x) / (x - 1)) ).toFixed(2);
			return M;
		}
		

</script>

							
			</div>
			</section>



@endsection
