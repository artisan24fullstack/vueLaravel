<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    post: Object,
});

</script>

<template>

    <AppLayout>
            <div class="max-w-3xl mx-auto">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{post.title}}</h1>
                <div class="mt-4 text-gray-600 dark:text-gray-400"  v-html="post.content"></div>
            </div>

            {{post}}
    </AppLayout>

</template>
