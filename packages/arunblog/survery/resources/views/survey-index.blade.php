<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Review Management</title>
  </head>

  <body>


    <div class="container">
    			
		<div class="row">
			<div class="col-sm-3">
				<div class="rating-block">
					<h4>Average user rating</h4>
					<h2 class="bold padding-bottom-7">{{ isset($avarageRating) ? $avarageRating : 0 }} <small>/ 5</small></h2>
					
                                        
                                        @for ($i = 1; $i <= 5; $i++)
                                        <?php
                                        if ($i <= $avarageRating) {
                                            echo '<button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                   </button>';
                                        } else {
                                            echo '<button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                                     <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                   </button>';
                                        }
                                        ?>

                                        @endfor
                                        
                      
				</div>
			</div>
			<div class="col-sm-3">
				<h4>Rating breakdown</h4>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
                                        <div class="pull-right" style="margin-left:10px;">{{ isset($ratings[5]) ? $ratings[5] : 0 }}</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">{{ isset($ratings[4]) ? $ratings[4] : 0 }}</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">{{ isset($ratings[3]) ? $ratings[3] : 0 }}</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">{{ isset($ratings[2]) ? $ratings[2] : 0 }}</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">{{ isset($ratings[1]) ? $ratings[1] : 0 }}</div>
				</div>
			</div>			
		</div>			
		
		<div class="row">
			<div class="col-sm-7">
				<hr/>
                                <div class="review-block" style="height: 500px; overflow-y: scroll;">
                                    @foreach ($reviews['reviews'] as $review)
					<div class="row">
						<div class="col-sm-12">
							<div class="review-block-rate">
								
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <?php if($i <= $review['rating_id']){
                                                                        echo '<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>';
                                                                    } else {
                                                                       echo '<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>'; 
                                                                        
                                                                    }
                                                                        
                                                                     ?>
                                                                    
                                                                @endfor
                                                              
								
							</div>
                                                    <div class="review-block-title"><i>{{$review['reviewer_name']}}</i></div>
							<div class="review-block-title">{{$review['review_title']}}</div>
							<div class="review-block-description">{{$review['review']}}</div>
						</div>
					</div>
                                    <br>
                                @endforeach
                                  
				</div>
			</div>
                    
                    
		</div>
		
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>
