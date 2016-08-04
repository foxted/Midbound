Vue.component('spark-websites', {
    /**
     * The component's data.
     */
    data() {
        return {
            websites: [],
        };
    },


    /**
     * Prepare the component.
     */
    ready() {
        this.getWebsites();
    },


    events: {
        /**
         * Broadcast that child components should update their websites.
         */
        updateWebsites() {
            this.getWebsites();
        }
    },


    methods: {
        /**
         * Get the current websites for the user.
         */
        getWebsites() {
            this.$http.get('/api/websites')
                .then(function(response) {
                    this.websites = response.data;
                });
        },
    }
});
