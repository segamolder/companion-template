<template>
    <div class="star-rating">
        <label class="star-rating__star" :style="'font-size:' + size" v-for="rating in ratings"
               :class="{'is-selected': ((value >= rating) && value != null), 'is-disabled': disabled}"
               v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out">
            <input class="star-rating star-rating__checkbox" type="radio" :value="rating" :name="name"
                   v-model="value" :disabled="disabled">★</label></div>
</template>

<script>
    import * as axios from "axios";

    export default {
        props: {
            'name': String,
            'value': null,
            'id': String,
            'disabled': Boolean,
            'required': Boolean,
            'tripInfoId': Number,
            'size' : String,
        },
        name: "star-rating",
        data: function () {
            return {
                tripInfoIdLocal: this.tripInfoId,
                temp_value: null,
                ratings: [1, 2, 3, 4, 5]
            };
        },

        methods: {
            save() {
                // if (this.tripInfoIdLocal !== undefined && this.tripInfoIdLocal !== null && this.tripInfoIdLocal !== 'undefined' && this.tripInfoIdLocal !== 'null') {
                //     let data = new FormData();
                //     data.append('rating', this.value);
                //     axios.post('/trip-info/update/' + this.tripInfoIdLocal, data, {}).then((response) => {
                //         this.disabled = true;
                //     })
                // }
            },
            /*
             * Behaviour of the stars on mouseover.
             */
            star_over: function (index) {
                var self = this;

                if (!this.disabled) {
                    this.temp_value = this.value;
                    return this.value = index;
                }

            },

            /*
             * Behaviour of the stars on mouseout.
             */
            star_out: function () {
                var self = this;

                if (!this.disabled) {
                    return this.value = this.temp_value;
                }
            },

            /*
             * Set the rating.
             */
            set: function (value) {
                var self = this;
                self.save();
                if (!this.disabled) {
                    this.temp_value = value;
                    return this.value = value;
                }

            }
        }
    }
</script>

<style scoped lang="scss">
    %visually-hidden {
        position: absolute;
        overflow: hidden;
        clip: rect(0 0 0 0);
        height: 1px;
        width: 1px;
        margin: -1px;
        padding: 0;
        border: 0;
    }

    .star-rating {

        &__star {
            display: inline-block;
            padding: 3px;
            vertical-align: middle;
            line-height: 1;
            font-size: 1.5em;
            color: #ABABAB;
            transition: color .2s ease-out;

            &:hover {
                cursor: pointer;
            }

            &.is-selected {
                color: #FFD700;
            }

            &.is-disabled:hover {
                cursor: default;
            }
        }

        &__checkbox {
            @extend %visually-hidden;
        }
    }

</style>
