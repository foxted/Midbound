<!-- Left Side Of Navbar -->
<li @if(request()->is('activity*')) class="active" @endif>
    <a href="{{ route('app.activity') }}">
        Activity
    </a>
</li>
<form class="navbar-form navbar-left search">
    <div class="form-group">
        <input class="form-control" id="searchField" placeholder="Search for anything..." value="">
    
        <!-- 
        ***** Script for search demo purposes only
        -->
        <script>
        setTimeout(function(){ 
            var searchField = document.getElementById("searchField");
            var searchPanel = document.getElementsByClassName("panel search")[0];
            searchField.addEventListener("keyup", function () {
                if (searchField.value !== "") {
                    showSearch();
                }
                else {
                    hideSearch();
                }
            });
            searchField.addEventListener("blur", function() {
                hideSearch();
            })
            searchField.addEventListener("focus", function() {
                 if (searchField.value !== "") {
                    showSearch();
                 }
            })
            function showSearch() {
                    searchPanel.style.display = "block";
            }
            function hideSearch() {
                    searchPanel.style.display = "none";
            }
        }, 1000);
        </script>

    </div>
    <!-- Default Search Panel -->
    <div class="panel search" style="display: none;">
        <div class="panel-body">
            <div class="search-results">
                <h3>Prospects</h3>
                <ul>
                    <li>
                        <a href="#">John Prospo<strong>lead</strong></a>
                        <a class="email" href="#">johnp@mbprospect.com</a>
                    </li>
                    <li>
                        <a href="#">Bob <strong>Lead</strong>sworth</a>
                        <a class="email" href="#">bobl@mblead.com</a>
                    </li>
                    <li>
                        <a href="#">Tommy Po<strong>lead</strong>opolous</a>
                        <a class="email" href="#">tommyp@mbco.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="#">Search</a>
            <div class="pull-right text-light-gray small">Powered by <img height="20" src="/img/algolia.png"></div>
        </div>
    </div>
    <!-- Advanced Search Panel -->
    <!-- <div class="panel search" style="margin-left: 430px;">
        <div class="panel-body">
            <div class="advanced-search">
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
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary">Search</a>
            <a class="btn btn-ghost">Save this search</a>
            <a class="btn btn-ghost pull-right">Cancel</a>
        </div>
    </div> -->
</form>


