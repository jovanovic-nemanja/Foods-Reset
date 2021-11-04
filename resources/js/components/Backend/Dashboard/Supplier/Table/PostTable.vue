<template>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="width:60px !important;">ID</td>
                <td>Item</td>
                <td>Category</td>
                <td>Description</td>
                <td>Unit Per Case</td>
                <td>Net Weight(LBS)</td>
                <td>Location</td>
                <td>Expiry Date</td>
                <td>Quantity</td>
                <td>List Price</td>
                <td>Per case/mod</td>
                <td>Per unit</td>
                <td>Status</td>
            </tr>

            <tr v-for="(post,index) in posts" :key="post.id">
                <td>{{ index + 1 }}</td>
                <td>{{ post.item }}</td>
                <td>{{ post.category }}</td>
                <td>{{ post.description }}</td>
                <td>{{ post.unit_per_case }}</td>
                <td>{{ post.net_weight }}</td>
                <td>{{ post.product_location }}</td>
                <td>{{ post.expiry }}</td>
                <td>{{ post.quantity }}</td>
                <td>{{ post.list_price }}</td>
                <td>{{ post.per_case_price }}</td>
                <td>{{ post.unit_per_case }}</td>
                <td>{{ post.status }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "PostTable",
    props: ['posts']
}
</script>

<style>
td {
    width: 100px !important;
}

table {
    table-layout: fixed;
    word-wrap: break-word;
}
</style>
