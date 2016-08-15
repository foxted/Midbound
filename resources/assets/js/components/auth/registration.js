
import Step1 from './registration/step-1.vue';
import Step2 from './registration/step-2.vue';
import Step3 from './registration/step-3.vue';

Vue.component('registration', {

    components: { Step1, Step2, Step3 },

    data() {
        return {
            component: 'step-1',
            registerForm: $.extend(true, new SparkForm({
                stripe_token: '',
                organization: '',
                website: '',
                name: '',
                email: '',
                password: '',
                plan: 'connect',
                terms: false
            }), Spark.forms.register),
        }
    }

});