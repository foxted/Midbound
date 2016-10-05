<div class="col-sm-3 col-md-2">
    <div class="list-group">
        <li class="list-header">Filters</li>
        <li class="list-group-item" :class="{'active': !filter}">
            <a href="/activity" aria-controls="most-recent">
                All
            </a>
        </li>
        <li class="list-group-item" :class="{'active': filter == 'prospects'}">
            <a href="/activity/prospects" aria-controls="most-engaged">
                My Prospects
            </a>
        </li>
    </div>
    <hr>
    <div class="list-group">
        <li class="list-group-item" :class="{'active': filter == 'ignored'}">
            <a href="/activity/ignored" aria-controls="ignored">
                Ignored
            </a>
        </li>
    </div>
</div>