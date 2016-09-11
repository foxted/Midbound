@extends('layouts.guest')

@section('title')
	Plans &amp; Pricing | Midbound
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h2>Plans &amp; Pricing</h2>
        <p class="lead">With <strong>unlimited users on all plans</strong>, enjoy the freedom the grow.</p>
    </div>
</div>

<div class="container">
    <div class="plans">
        <div class="prospect-count">
        <form name="prospectCount" class="" method="POST" action="">
            {{ csrf_field() }}
        <p><strong>Number of <span class="hover-info" data-toggle="tooltip" data-placement="top" title="Number of prospects that you are tracking and/or actively engaged with at any one time.">Active Prospects</span> </strong></p>
            <div class="radio">
              <label id="prospects250">
                <input type="radio" name="prospects" value="250">
                Up to 250
              </label>
            </div>
            <div class="radio">
              <label id="prospects500">
                <input type="radio" name="prospects" value="500">
                Up to 500
              </label>
            </div>
            <div class="radio">
              <label id="prospects1000" class="active">
                <input type="radio" name="prospects" value="1000" checked>
                Up to 1,000
              </label>
            </div>
            <div class="radio">
              <label id="prospects2000">
                <input type="radio" name="prospects" value="2000">
                Up to 2,000
              </label>
            </div>
            <div class="radio">
              <label id="prospects5000">
                <input type="radio" name="prospects" value="5000">
                Up to 5,000
              </label>
            </div>
            <div class="radio">
              <label id="prospects10000">
                <input type="radio" name="prospects" value="10000">
                Up to 10,000
              </label>
            </div>
            <div class="radio">
              <label id="prospects99999">
                <input type="radio" name="prospects" value="99999">
                More than 10,000
              </label>
            </div>
            </form>
        </div>
        <div class="panel panel-plan">
            <div class="panel-heading basic">
                <h2>Basic</h2>
                <p class="plan-description">Track every prospect's every move.</p>
                <div class="text-small"><span class="dollar">$</span><span id="basicPrice">59.99</span>&nbsp;/mo</div>
            </div>
            <div class="panel-body">
                <ul>
                    <li class="hover-info" data-toggle="tooltip" data-placement="left" title="Add as many people from your marketing and sales teams as you'd like."><strong>Unlimited</strong> Users</li>
                    <li class="hover-info" data-toggle="tooltip" data-placement="left" title="When your website visitors fill out forms on your website, they will automatically appear in Midbound.">Capture <strong>New Prospects</strong></li>
                    <li class="hover-info" data-toggle="tooltip" data-placement="left" title="Capture all past and future prospect events so you have a full history of activity to review for each prospect.">Track Prospect <strong>Activity</strong></li>
                </ul>
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary">Start 30-Day Free Trial</a>
                <div class="cta-description">No Credit Card Required</div>
            </div>
        </div>
        <div class="panel panel-plan">
            <div class="panel-heading pro">
                <h2>Pro</h2>
                <p class="plan-description">Automate your prospect engagement.</p>
                <div class="text-small"><span class="dollar">$</span><span id="proPrice">149.99</span>&nbsp;/mo</div>
            </div>
            <div class="panel-body">
                <ul>
                     <li class="hover-info" data-toggle="tooltip" data-placement="right" title="Add as many people from your marketing and sales teams as you'd like."><strong>Unlimited</strong> Users</li>
                    <li class="hover-info" data-toggle="tooltip" data-placement="right" title="When your website visitors fill out forms on your website, they will automatically appear in Midbound.">Capture <strong>New Prospects</strong></li>
                    <li class="hover-info" data-toggle="tooltip" data-placement="right" title="Capture all past and future prospect events so you have a full history of activity to review for each prospect.">Track Prospect <strong>Activity</strong></li>
                    <li class="hover-info" data-toggle="tooltip" data-placement="right" title="Create flows that are a series of personalized, auto emails and other steps, such as phone calls and LinkedIn messages."><strong>Unlimited Flows</strong></li>
                </ul>
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary">Start 30-Day Free Trial</a>
                <div class="cta-description">No Credit Card Required</div>
            </div>
        </div>
    </div>
</div>

<script>

    var prospectCountForm = document.prospectCount; 
    var radioButtons = prospectCountForm.prospects;
    var proPrice = document.getElementById("proPrice");
    var basicPrice = document.getElementById("basicPrice");
    var activeOption = "1000";
    
    prospectCountForm.onchange = function() {
            updateActiveOption();
            updatePrice();
    };
    
    function updateActiveOption() {
        for (var i = 0; i < radioButtons.length; i++) {
            if(radioButtons[i].checked === true) {
                radioButtons[i].parentElement.className = "active";
                activeOption = radioButtons[i].value;
            }
            else {
                radioButtons[i].parentElement.className = "";
            }
        }

    }

    function updatePrice() {
        console.log(activeOption);
        switch(activeOption) {
            case "250":
                basicPrice.innerText  = "19.99";
                proPrice.innerText  = "49.99";
                break;
             case "500":
                basicPrice.innerText  = "35.99";
                proPrice.innerText    = "89.99";
                break;
            case "1000":
                basicPrice.innerText  = "59.99";
                proPrice.innerText    = "149.99";
                break;
            case "2000":
                basicPrice.innerText  = "79.99";
                proPrice.innerText    = "199.99";
                break;
            case "5000":
                basicPrice.innerText  = "99.99";
                proPrice.innerText    = "249.99";
                break;
            case "10000":
                basicPrice.innerText  = "119.99";
                proPrice.innerText    = "299.99";
                break;
            case "99999": 
                basicPrice.innerText  = "(Custom Pricing)";
                proPrice.innerText    = "(Custom Pricing)";
                break;
        }
    }
    
    

</script>


@endsection