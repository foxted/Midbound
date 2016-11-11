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

    <div class="alert alert-warning" v-if="prospectIgnored">
        <small>
            "@{{ prospectIgnored.name }}" is now ignored. <br>
            <a href="#" @click="track(prospectIgnored, true)">Undo</a>
        </small>
    </div>
    <div class="alert alert-warning" v-if="prospectTracked">
        <small>
            "@{{ prospectTracked.name }}" is now tracked again. <br>
            <a href="#" @click="ignore(prospectTracked, true)">Undo</a>
        </small>
    </div>
</div>