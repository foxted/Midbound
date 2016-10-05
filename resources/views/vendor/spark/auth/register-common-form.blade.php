<registration :invitation="invitation" :register-form="registerForm" inline-template>
    <div class="register">
        <component :is="component" :component.sync="component"
                   :invitation="invitation" :register-form.sync="registerForm"
                   :email-developer-form.sync="emailDeveloperForm"
                   :website.sync="website"></component>
    </div>
</registration>