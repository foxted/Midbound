<spark-websites-list :websites.sync="websites" inline-template>
    <div>
        <div>
            <div class="panel panel-default" v-if="websites.length > 0">
                <div class="panel-heading">Websites</div>

                <div class="panel-body">
                    <table class="table table-borderless m-b-none">
                        <thead>
                            <th>URL</th>
                            <th>Latest Activity</th>
                            <th></th>
                            <th></th>
                        </thead>

                        <tbody>
                            <tr v-for="website in websites">
                                <!-- URL -->
                                <td>
                                    <div class="btn-table-align">
                                        @{{ website.url }}
                                    </div>
                                </td>

                                <!-- Last Used At -->
                                <td>
                                    <div class="btn-table-align">
                                        {{--<span v-if="website.last_used_at">--}}
                                            {{--@{{ website.last_used_at | datetime }}--}}
                                        {{--</span>--}}

                                        <span v-else>
                                            Never
                                        </span>
                                    </div>
                                </td>

                                <!-- Edit Button -->
                                <td>
                                    <button class="btn btn-primary-outline" @click="viewWebsite(website)">
                                        <i class="fa fa-code"></i> Tracking Script
                                    </button>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <button class="btn btn-danger-outline" @click="approveWebsiteDelete(website)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Update Token Modal -->
        <div class="modal fade" id="modal-view-website" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="showingWebsite">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Tracking Script for @{{ showingWebsite.url }}
                        </h4>
                    </div>

                    <div class="modal-body">
                       <div class="alert alert-warning">
                                <p>
                                    To capture prospect activity, add the Midbound Tracker to your website.
                                    <i class="fa fa-question-circle"
                                       @click="showMoreInformation"
                                       data-container="body" data-toggle="popover" data-placement="right"
                                       data-html="true" title="The Midbound Tracker"
                                       data-content="The Midbound Tracker provides you with real-time prospect data from your website. <br><a href='#'>Learn More</a>"></i>
                                </p>

                                <p>
                                    <strong>Instructions:</strong>
                                <ul>
                                    <li>Add the tag below to public-facing pages of your website.</li>
                                    <li>Place the tag before the closing <code>&lt;body&gt;</code> tag.</li>
                                </ul>
                                </p>
                            </div>

                        <pre>@{{ showingWebsite.snippet }}</pre>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Token Modal -->
        <div class="modal fade" id="modal-delete-website" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="deletingWebsite">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Delete website (@{{ deletingWebsite.url }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to delete this website? If deleted, the associated tracker will not record
                        any data anymore.
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                        <button type="button" class="btn btn-danger" @click="deleteWebsite" :disabled="deleteWebsiteForm.busy">
                            Yes, Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-websites-list>
