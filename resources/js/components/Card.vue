<template>
    <component :is="card.withoutCardStyles ? 'div' : 'Card'" class="backButton" :class="cardClassList">
        <Link
            v-if="card.url"
            :href="card.url"
            class="backButton__content"
            :class="{ 'px-3': ! card.withoutCardStyles, 'py-3': ! card.withoutCardStyles }"
            v-html="card.content"
        >
        </Link>

        <a
            v-else
            href="javascript:history.go(-1)"
            class="backButton__content"
            :class="{ 'px-3': ! card.withoutCardStyles, 'py-3': ! card.withoutCardStyles }"
            v-html="card.content"
        ></a>
    </component>
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
                    classes += ' flex flex-col items-center justify-center';
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
        min-height: inherit;
    }
    .backButton__content > p:not(:last-child) {
        margin-bottom: 1em;
    }
</style>
