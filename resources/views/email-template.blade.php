@extends("index")
@section("contact")

                <form action="#" method="post">
	                <div class="col-md-6 col-sm-6 col-xs-6 form-right form-left">
						<input type="text" name="name" placeholder="Name" required="">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 form-right ">
						<input type="text" name="last_name" placeholder="Last name" required="">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 form-right form-left">
						<input type="email" name="email" placeholder="Email" required="">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 form-right ">
						<input type="text" name="phone" placeholder="Phone" required="">
						<div class="clearfix"> </div>
					</div>
					
					<textarea name="message" placeholder="Message" required=""></textarea>
					<input type="submit" value="SUBMIT">
				</form>

@endsection