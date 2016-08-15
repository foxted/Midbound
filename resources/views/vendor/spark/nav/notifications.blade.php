<!-- Notifications -->
<li>
    <a @click="showNotifications" class="has-activity-indicator">
    <div class="navbar-icon">
        <i class="activity-indicator" v-if="hasUnreadNotifications || hasUnreadAnnouncements"></i>
        <i class="icon fa fa-bell"></i>
    </div>
    </a>
</li>