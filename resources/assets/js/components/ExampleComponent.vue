<template>
    <div>
        <div v-for="(book, index) in books">
            <tr>
                <td>
                    {{ book.age }}
                </td>
                <td>
                    {{ book.eyeColor }}
                </td>
            </tr>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: null
            };
        },
        mounted() {
            axios
                .get('http://127.0.0.1:8000/pain')
                .then(response => {
                    console.log(response.data);
                    this.books = response.data
                    ar = this.$refs.foo.$el.innerHTML;
                    console.log(ar);
                });
            console.log('Component mounted.')
        }
    }
</script>
