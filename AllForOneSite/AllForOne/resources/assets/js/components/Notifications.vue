<template>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li role="presentation" v-for="notification in notifications">
            <a role="menuitem">
                <i class="icon md-notifications" aria-hidden="true"></i>
                {{ notification.data.message }}.
            </a>
        </li>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notifications: []
            }
        },
        mounted() {
            axios.get('/api/notificationsVue')
                .then(response => {
                    this.notifications = response.data;
                })
        }
    }
</script>
