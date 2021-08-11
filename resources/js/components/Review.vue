<template>
    <div class="container-fruid h-100 pt-5">
        <i class="fa fa-plus pl-3" data-toggle="modal" data-target="#reviewModal"></i><span class="align-middle"> Create A New Review</span>

        <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <input v-model="title" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="addNewGoal">Post</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <input v-model="title" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="editGoalTitle">Edit</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Goal?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="deleteGoal">Delete</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-group h-100">
            <div v-for="(review, key, index) in reviews" :key=index>
                <div class="card h-100 m-3" style="width: 24rem;">
                    <div class="d-flex justify-content-between">
                        <h3 class="ml-5 mt-2">{{ review.title }}</h3>
                        <div>
                            <i class="fa fa-plus p-2" data-toggle="modal" :data-target="'#todoModal'+goal.id"></i>
                            <div class="btn-group dropdown">
                                <i class="fa fa-ellipsis-v p-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="text-center" data-toggle="modal" data-target="#editGoalModal" v-on:click="title = review.title; id = review.id">Edit</div>
                                        <div class="text-danger text-center" data-toggle="modal" data-target="#deleteReviewModal" v-on:click="id = review.id">Delete</div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <reviews-todos :reviewId="review.id"></reviews-todos>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import $ from "jquery"
import Todos from "./Todos.vue";
export default {
    data: function() {
        return {
            id: "",
            title: "",
            tagId: "",
            tagTitle: "",
            goals: [],
            tags: []
        }
    },
    components: {
        'goals-todos': Todos
    },
    mounted: function () {
        this.getAllReviews();
        this.getAllTags();
    },
    methods: {
        getAllReviews: function () {
            axios.get("/reviews").then((response) => {
                for(let i = 0; i < response.data.length; i++) {
                    this.reviews.push(response.data[i])
                }
            }, (error) => {
                console.log(error)
            })
        },
        addNewReview: function () {
            axios.defaults.headers['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
            axios.defaults.headers['content-type'] = 'application/json';
            axios.post("/reviews", {title: this.title}).then((response) => {
                this.reviews.length = 0;
                for (let i = 0; i < response.data.length; i++) {
                    this.reviews.push(response.data[i])
                }
            }, (error) => {
                console.log(error)
            })
            this.title = ""
        },
        editReviewTitle: function () {
            axios.defaults.headers['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
            axios.defaults.headers['content-type'] = 'application/json';
            axios.post(`/reviews/${this.id}`, {title: this.title, _method: 'patch'}).then((response) => {
                this.reviews.length = 0;
                for (let i = 0; i < response.data.length; i++) {
                    this.reviews.push(response.data[i])
                }
            }, (error) => {
                console.log(error)
            })
            this.title = ""
        },
        deleteReview: function () {
            axios.defaults.headers['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
            axios.defaults.headers['content-type'] = 'application/json';
            console.log(this.id)
            axios.post(`/reviews/${this.id}`, {_method: 'delete'}).then((response) => {
                this.goals = response.data;
            }, (error) => {
                console.log(error)
            })
            this.id = ""
        },

    }
}
</script>
