<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

import { computed } from 'vue';

// Define props
const props = defineProps({
    post: Object,
});

// Compute the thumbnail URL
const thumbnailUrl = computed(() => {
    // Assuming post.thumbnail already starts with '/storage/'
    // If not, prepend '/storage/' to the path
    return props.post.thumbnail.startsWith('/storage/')
        ? props.post.thumbnail
        : '/storage/' + props.post.thumbnail;
});
</script>

<template>

    <AppLayout>
            <div class="max-w-3xl mx-auto">
                <img class="rounded-t-lg" :src="thumbnailUrl" alt="random" />
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{post.title}}</h1>
                <div class="mt-4 text-gray-600 dark:text-gray-400"  v-html="post.content"></div>
            </div>

            {{post}}
    </AppLayout>

</template>
