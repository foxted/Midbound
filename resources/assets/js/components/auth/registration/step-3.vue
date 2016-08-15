<template>
    <div>
        <div class="col-md-8 col-md-offset-2 text-center">
            <h1>Nice to meet you, Bob</h1>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <section class="registration step-3 panel panel-default">
                <main class="panel-body">
                    <div class="alert alert-warning">
                        <p>
                            To get started, add the Midbound Tracker to your website.
                            <i class="fa fa-question-circle"
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
                    <pre>something</pre>
                    <button class="btn btn-primary"><i class="fa fa-send"></i>&nbsp;Email to a developer</button>
                    <button class="btn btn-default"><i class="fa fa-check"></i>&nbsp;This is done</button>
                    <button class="btn btn-ghost pull-right">Do this later</button>
                </main>
            </section>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">

    export default {

        props: ['component', 'registerForm'],

        methods: {
            nextStep() {
                this.component = 'step-3';
            }
        }

    }

</script>