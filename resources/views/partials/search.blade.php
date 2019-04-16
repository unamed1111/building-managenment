<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			  <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel-4">New message</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			      <span aria-hidden="true">&times;</span>
			    </button>
			  </div>
			  <div class="modal-body">
			    <form id="search_data_form" action="{{$route}}" method="GET">
			      	<div class="form-group">
			        	<label for="search_data" class="col-form-label">Nội dung:</label>
			        	<input type="text" class="form-control" id="search_data" name="search">
			    	</div>
			    </form>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-success" onclick="document.getElementById('search_data_form').submit();">Search</button>
			    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
			  </div>
		</div>
	</div>
</div>
<button type="button" class="btn btn-success btn-rounded btn-fw" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@mdo">Search</button>