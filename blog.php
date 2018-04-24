<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Metronic | Actions
		</title>
		<meta name="description" content="Actions example page">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
    	<!--begin::Base Styles -->
		<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!-- include libraries(jQuery, bootstrap) -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

		<!-- include summernote css/js -->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
		<!--end::Base Styles -->
		<!-- <link rel="shortcut icon" href="../assets/demo/default/media/img/logo/favicon.ico" /> -->
		<style>
		.m-form .m-form__group label {
			font-weight: 400;
			font-size: 2rem;
		}
		</style>
	</head>
	
	<body>
		<!-- END: Subheader -->
		<div class="m-content">
			<!--begin::Portlet-->
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Create A Post
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right" method="POST" enctype="multipart/formdata" id="blogForm">
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Title
							</label>
							<div class="col-lg-7 col-md-7 col-sm-12">
								<input type="text" class="form-control m-input" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter post title">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Content
							</label>
							<div class="col-lg-7 col-md-7 col-sm-12">
								<textarea class="summernote" id="summernote"></textarea>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-3 col-sm-12">
								Image
							</label>
							<div class="col-lg-7 col-md-7 col-sm-12">
								<input type="file" name="image" id="image" placeholder="Add Image">
							</div>
						</div>

					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<div class="row">
								<div class="col-lg-9 ml-lg-auto">
									<input type="submit" class="btn btn-brand" name="submit" value="Submit" readonly>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Portlet-->
		</div>
		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/header/actions.js" type="text/javascript"></script>
		<script>
			$("#blogForm").submit(function(e) {
				e.preventDefault();
        		var title = $("#title").val();
				var detail = $('#summernote').summernote('code');
				var formData = new FormData(this);
        		formData.append('detail', detail);
				var image = $('#image').get(0).files[0];
				if(title=='' || detail=='' || (image==undefined)){
					alert('Please fill all fields !');
				}
				else
				{
					$.ajax({
						type: 'POST',
						url: 'add_blog.php',
						data:  formData,
						contentType: false,
						cache: false,
						processData:false,
						success: function(res){
							if(parseInt(res)==1){
								alert("Blog addded successfully !");
							}
							else{
								alert('Sorry, Unable to add blog !');
							}
							window.location.href='home.php';
						},
						error: function(){
							alert('Sorry, Unable to add blog !');
							window.location.href='home.php';
						}
					});
				}
			});
		</script>		
	</body>
	<!-- end::Body -->
</html>
