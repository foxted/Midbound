
import Step1 from './registration/step-1.vue';
import Step2 from './registration/step-2.vue';

Vue.component('registration', {

    components: { Step1, Step2 },

    data() {
        return {
            component: 'step-1',
            website: null,
            registerForm: $.extend(true, new SparkForm({
                stripe_token: '',
                organization: '',
                website: '',
                name: '',
                email: '',
                password: '',
                plan: 'connect',
                terms: false
            }), Spark.forms.register)
        }
    }

});