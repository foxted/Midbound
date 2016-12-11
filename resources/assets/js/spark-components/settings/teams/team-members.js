var base = require('settings/teams/team-members');

Vue.component('spark-team-members', {
    mixins: [base],
    methods: {
        /**
         * Determine if the current user can delete a team member.
         */
        canDeleteTeamMember(member) {
        	if (member.pivot.role == "member") {
        		return this.user.id !== member.id;
        	}  else {
        		return this.user.id === this.team.owner_id && this.user.id !== member.id
        	}
        }
    }
});
