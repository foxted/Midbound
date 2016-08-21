<spark-create-website inline-template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a Website to Track
            </div>

            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <!-- Website URL -->
                    <div class="form-group" :class="{'has-error': form.errors.has('url')}">
                        <label class="col-md-4 control-label">Website URL</label>

                        <div class="col-md-6">
                            <input type="url" class="form-control" name="url" v-model="form.url" placeholder="(e.g. 'http://www.myleadgenmachine.io')">

                            <span class="help-block" v-show="form.errors.has('url')">
                                @{{ form.errors.get('url') }}
                            </span>
                        </div>
                    </div>

                    <!-- Create Button -->
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-6">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="create"
                                    :disabled="form.busy">

                                Get Tracking Script
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Show Token Modal -->
        <div class="modal fade" id="modal-show-website" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="showingWebsite">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Website (@{{ showingWebsite.url }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        <p>
                            Here is the snippet that you need to copy and paste in your website code:
                        </p>

                        <pre>@{{ showingWebsite.snippet }}</pre>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-create-website>
