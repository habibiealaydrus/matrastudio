<template>
    <div>
        <div class="container card mt-3 mb-3">
            <h1 class="h1">Welcome to admin</h1>
            <div class="row d-flex flex-row p-3">
                <div class="col-md-6">
                    <h4>Content</h4>
                    <div class="small-box bg-info">
                        <div class="d-flex justify-content-evenly px-1 py-1">
                            <div>
                                <h3 class="h1">
                                    {{
                                        event.length +
                                        blog.length +
                                        project.length +
                                        news.length
                                    }}
                                </h3>
                                <p class="fs-6">Content</p>
                            </div>
                            <div>
                                <font-awesome-icon
                                    :icon="['fas', 'image']"
                                    style="min-width: 5rem; min-height: 5rem"
                                />
                            </div>
                        </div>
                        <a href="admin/content" class="smallboxfooter"
                            ><font-awesome-icon :icon="['fas', 'arrow-left']" />

                            More info
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Messages</h4>
                    <div class="small-box bg-success">
                        <div class="d-flex justify-content-evenly px-1 py-1">
                            <div>
                                <h2 class="h1">{{ mesagges.length }}</h2>
                                <p class="fs-6">Messages</p>
                            </div>
                            <div>
                                <font-awesome-icon
                                    :icon="['fas', 'envelope']"
                                    style="min-width: 5rem; min-height: 5rem"
                                />
                            </div>
                        </div>
                        <a href="/admin/inquiry" class="smallboxfooter"
                            ><font-awesome-icon :icon="['fas', 'arrow-left']" />

                            More info
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Inquiry messages</h3>
                            <div class="card-tools">
                                <div
                                    class="input-group input-group-sm"
                                    style="width: 150px"
                                ></div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-3">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Type Project</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in inquiry">
                                        <td>{{ item.first_name }}</td>
                                        <td>{{ item.company_name }}</td>
                                        <td>
                                            <span class="tag tag-success">{{
                                                item.company_location
                                            }}</span>
                                        </td>
                                        <td>{{ item.type_project }}</td>
                                        <td class="d-flex flex-row gap-1">
                                            <button class="btn btn-primary">
                                                View Detail
                                            </button>
                                            <button class="btn btn-success">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <a href="/admin/inquiry">
                                                <button class="btn btn-primary">
                                                    See All Inquiry Messsage
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const inquiry = ref([]);
const urlinquiry = "/inqurymessagelimited";

const getinquiry = async () => {
    try {
        const response = await axios.get(urlinquiry);
        inquiry.value = response.data.data;
    } catch (error) {}
};

const mesagges = ref([]);
const urlmessages = "http://127.0.0.1:8000/api/allmessage";

const getmessages = async () => {
    const response = await axios.get(urlmessages);

    mesagges.value = response.data.data;
};

const blog = ref([]);
const urlblog = "http://127.0.0.1:8000/api/allblog";

const getblog = async () => {
    const response = await axios.get(urlblog);

    blog.value = response.data.data;
};

const news = ref([]);
const urlnews = "http://127.0.0.1:8000/api/newsall";

const getnews = async () => {
    const response = await axios.get(urlnews);

    news.value = response.data.data;
};

const project = ref([]);
const urlproject = "http://127.0.0.1:8000/api/client";

const getproject = async () => {
    const response = await axios.get(urlproject);

    project.value = response.data.data;
};

const event = ref([]);
const urlevent = "http://127.0.0.1:8000/api/event";

const getevent = async () => {
    const response = await axios.get(urlevent);

    event.value = response.data.data;
};

onMounted(() => {
    getinquiry();
    getmessages();
    getblog();
    getnews();
    getproject();
    getevent();
});
</script>

<style lang="scss" scoped></style>
