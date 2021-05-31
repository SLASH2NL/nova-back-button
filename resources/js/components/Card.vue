<template>
    <compoonent :is="card.withoutCardStyles ? 'div' : 'card'" class="backButton" :class="cardClassList">
        <router-link
            v-if="card.url"
            :to="card.url"
            v-html="card.content"
            class="backButton__content"
            v-class="{ 'px-3': ! card.withoutCardStyles, 'py-3': ! card.withoutCardStyles }"
        ></router-link>

        <a
            v-else
            href="javascript:history.go(-1)"
            v-html="card.content"
            class="backButton__content"
            v-class="{ 'px-3': ! card.withoutCardStyles, 'py-3': ! card.withoutCardStyles }"
        ></a>
    </compoonent>
</template>

<script>
    export default {
        props: [
            'card',
        ],
        computed: {
            cardClassList() {
                let classes = '';
                if (this.card.center) {
                    classes += ' flex flex-col justify-center text-center';
                }

                return classes;
            },
        },
        mounted() {
            if (this.card.forceFullWidth) {
                this.$parent.$el.classList.remove('w-5/6');
                this.$parent.$el.classList.add('w-full');
            }
        },
    }
</script>

<style>
    .backButton {
        height: auto;
    }
    .backButton__content > p:not(:last-child) {
        margin-bottom: 1em;
    }
</style>
