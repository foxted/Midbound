<form action="#" class="newsletter col-md-4 col-md-offset-4" @submit.prevent="subscribe">
    <small class="text-center text-danger" v-if="errors && errors.email">
        @{{ errors.email }}
    </small>
    <small class="text-success text-center" v-if="success">
        Subscription successful! Stay tuned!
    </small>
    <div class="form-group" :class="{ 'has-error': errors && errors.email }">
        <input type="email" name="email" placeholder="Enter your work email" class="form-control" v-model="email" autofocus>
    </div>
    <button type="submit" class="btn btn-lg btn-primary btn-block" v-if="!busy">
        Get early access
    </button>
    <button type="button" class="btn btn-lg btn-primary btn-block" disabled v-else>
        Please wait...
    </button>
</form>