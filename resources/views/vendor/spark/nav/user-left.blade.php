<!-- Left Side Of Navbar -->
<li @if(request()->is('prospects*')) class="active" @endif>
    <a href="{{ route('app.prospects.index') }}">
        Prospects
    </a>
</li>
<form class="navbar-form navbar-left search"> 
	<div class="form-group"> 
		<input class="form-control" onclick="showAdvancedSearch();" placeholder="Search for anything..."> 
	</div> 
	<!-- Advanced Search Panel -->
       <div class="panel advanced-search" id="advancedSearchPanel" style="display:none;">
          <div class="panel-body">
          	<div class="list-group">
                    <div class="list-header">Type</div>
                    <a href="#" class="list-group-item active">Prospects</a>
                    <a href="#" class="list-group-item disabled">Companies</a>
                    <a href="#" class="list-group-item disabled">Campaigns</a>
                    <a href="#" class="list-group-item disabled">Tasks</a>
              </div>
              <div class="list-group">
                    <div class="list-header">Assigned To</div>
                    <a href="#" class="list-group-item active">Me</a>
                    <a href="#" class="list-group-item">Others</a>
                    <a href="#" class="list-group-item">Not assigned</a>
                    <a href="#" class="list-group-item">Any</a>
                </div>
                <div class="list-group">
                    <div class="list-header">Score</div>
                    <a href="#" class="list-group-item">Low</a>
                    <a href="#" class="list-group-item">Medium</a>
                    <a href="#" class="list-group-item active">High</a>
                    <a href="#" class="list-group-item">Any</a>
                </div>
          </div>
          <div class="panel-footer">
          	<button class="btn btn-primary" type="submit">Search</button>
          	<a class="btn btn-ghost">Save this Search</a>
          	<div class="pull-right">
              		<a class="btn btn-ghost" href="#"> Cancel</a>
              </div>
          </div>
       </div>
</form>


