module.exports = {
    props: ['user', 'teamId'],


    /**
     * Load mixins for the component.
     */
    mixins: [require('./../../mixins/tab-state')],


    /**
     * The component's data.
     */
    data() {
        return {
            billableType: 'team',
            team: null
        };
    },


    /**
     * The component has been created by Vue.
     */
    created() {
        this.getTeam();
    },


    /**
     * Prepare the component.
     */
    ready() {
        setTimeout(() => {
            alert('Will now active tabs');
            this.usePushStateForTabs('.spark-settings-tabs');
        }, 2000);
    },


    events: {
        /**
         * Update the team being managed.
         */
        updateTeam() {
            this.getTeam();
        }
    },


    methods: {
        /**
         * Get the team being managed.
         */
        getTeam() {
            this.$http.get(`/teams/${this.teamId}`)
                .then(response => {
                    this.team = response.data;
                });
        }
    }
};
