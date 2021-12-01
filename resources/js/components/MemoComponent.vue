<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">メモ帳</div>
                    <div class="card-body">
                        <form method="post" action="./save">
                         <input type="hidden" name="_token" v-bind:value="csrf">
                            <input
                                type="hidden"
                                name="user_id"
                                v-model="users.id"
                            />
                            <textarea
                                class="form-control"
                                name="memo"
                                id="textarea1"
                                rows="20"
                                v-model="memo"
                            ></textarea>
                            <button
                                type="submit"
                                name="save"
                                class="btn btn-primary"
                            >
                                保存
                            </button>
                            <button
                                type="submit"
                                name="update"
                                class="btn btn-warning"
                            >
                                更新
                            </button>
                            <button
                                type="submit"
                                name="delete"
                                class="btn btn-danger"
                            >
                                削除
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            users: [],
            memo:""
        };
    },

    props: {
        csrf: {
            type: String,
            required: true,
        },
    },
    
    mounted() {
        //async awaitにする
        axios.get("http://127.0.0.1:8000/api/profile").then((response) => {
            this.users = response.data;
        });
        axios.get("http://127.0.0.1:8000/api/memo").then((response) => {
            this.memo = response.data;
        });
    },
};
</script>
