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

                        <tbody >
                            <tr v-for="website in websites" >
                                <!-- URL -->
                                <td v-cloak class="website-url" :key="website.id">
                                    <div class="btn-table-align" 
                                        :class="{ editing: website == editingWebsite }">
                                        <div class="view">
                                            <label @click="editUrl(website)"> 
                                                @{{ website.url }}
                                            </label>
                                        </div>
                                        <input class="edit form-control" type="text" 
                                            v-model="website.url"
                                            v-el="urlInput"  
                                            @blur="doneEditUrl(website)"
                                            @keyup.enter="doneEditUrl(website)"
                                            @keyup.esc="cancelEditUrl(website)" /> 
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
                                data-container="body" data-toggle="popover" data-placement="right"
                                data-html="true" title="The Midbound Tracker"
                                data-content="
                                The Midbound Tracker provides you with real-time prospect data from your website. <br><a href='#'>Learn More</a>
                                "></i>
                            </p>
                            <p><strong>Instructions:</strong></p>
                            <ul>
                                <li>Add the tag below to public-facing pages of your website.</li>
                                <li>Place the tag before the closing <code>&lt;body&gt;</code> tag.</li>
                            </ul>
                        </div>

                        <pre>@{{ showingWebsite.snippet }}</pre>

                        <form @submit.prevent="sendEmail">
                            <p>Send to a developer:</p>
                            <div class="input-group col-md-8">
                                <input type="email" class="form-control" v-model="emailDeveloperForm.email" autofocus>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span v-if="emailDeveloperForm.busy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Sending email...
                                        </span>

                                        <span v-else>
                                          Send email
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </form>
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
