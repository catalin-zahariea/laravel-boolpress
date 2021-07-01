const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        title: 'Our blog posts',
        posts: []
    },
    mounted() {
        axios.get('/api/posts')
        .then(result => {
            this.posts = result.data.posts;
        });
    }
})