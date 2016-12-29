<spark-cancel-subscription :user="user" :team="team" :billable-type="billableType" inline-template>
    <section class="spark-cancel-subscription">
        <div class="panel panel-danger">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    <i class="fa fa-warning"></i>&nbsp;Danger Zone
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item clearfix">
                    <div class="pull-left">
                        <h4>Cancel your subscription</h4>
                        <p class="text-muted">
                            <small>
                                The benefits of your subscription will continue until your current billing period ends.
                                You may resume your subscription at no extra cost until the end of the billing period.
                            </small>
                        </p>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-danger-outline"
                        @click="confirmCancellation"
                        :disabled="form.busy">
                        Cancel subscription
                        </button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Confirm Cancellation Modal -->
        <div class="modal fade" id="modal-confirm-cancellation" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Cancel Subscription
                        </h4>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to cancel your subscription?
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                        <button type="button" class="btn btn-danger" @click="cancel" :disabled="form.busy">
                        <span v-if="form.busy">
                            <i class="fa fa-btn fa-spinner fa-spin"></i>Cancelling
                        </span>

                        <span v-else>
                            Yes, Cancel
                        </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</spark-cancel-subscription>
