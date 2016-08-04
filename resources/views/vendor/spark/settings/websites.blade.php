<spark-websites inline-template>
    <div>
        <!-- Create website -->
        <div>
            @include('spark::settings.websites.create-website')
        </div>

        <!-- Websites -->
        <div>
            @include('spark::settings.websites.list')
        </div>
    </div>
</spark-websites>
