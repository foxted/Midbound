@extends('layouts.guest')

@section('content')
    <div class="container">
        <install-website :user="user" website-url="{{ $website->resourceUrl }}" inline-template>
            <div class="install-website">
                <div class="page-header" v-if="user">
                    <h2>Nice to meet you, @{{ user.name }}</h2>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <section class="registration panel panel-default">
                        <main class="panel-body">
                            <div class="alert alert-warning">
                                <p>
                                    To get started, add the Midbound Tracker to your website.
                                    <i class="fa fa-question-circle"
                                       @hover="showMoreInformation"
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
                            <pre v-if="website">@{{ website.snippet }}</pre>
                            <button type="button" class="btn btn-primary" @click.prevent="showEmailDeveloperForm">
                                <i class="fa fa-send"></i>&nbsp;Email to a developer
                            </button>
                            <a href="/dashboard" title="Go to your dashboard" class="btn btn-default">
                                <i class="fa fa-check"></i>&nbsp;This is done
                            </a>
                            <a href="/dashboard" title="Do this later" href="/dashboard" class="btn btn-ghost pull-right">
                                Do this later
                            </a>
                        </main>
                    </section>
                </div>
                <!-- Email Developer Modal -->
                <div class="modal fade" id="email-developer" tabindex="-1" role="dialog"
                     aria-labelledby="email-developer" v-if="emailDeveloperForm">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Email instructions to a developer</h4>
                            </div>
                            <form action="#" method="POST" class="form-horizontal">
                                <div class="modal-body">
                                    <!-- Developer email -->
                                    <div class="form-group"
                                         :class="{'has-error': emailDeveloperForm.errors.has('email')}">
                                        <label class="col-md-4 control-label">Send instructions to:</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="website"
                                                   v-model="emailDeveloperForm.email" placeholder="developer@mycompany.com">

                                            <span class="help-block" v-show="emailDeveloperForm.errors.has('email')">
                                                    @{{ emailDeveloperForm.errors.get('email') }}
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" @click.prevent="sendEmail"
                                            :disabled="emailDeveloperForm.busy">
                                        <span v-if="emailDeveloperForm.busy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Sending email...
                                        </span>

                                        <span v-else>
                                          Send email
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </install-website>
    </div>
@stop