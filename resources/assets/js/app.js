
require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#tab-row'
// });



(function () {

    let page = 2;
    let btnBookLoad = document.querySelector('.load-books');

    btnBookLoad.addEventListener('click', getBooks);

    async function getBooks() {

        let tableOfBooks = document.querySelector('#list-books tbody');
        let template = '';

        try {
            let url = '/' + location.search;

            const response = await axios.get(url, {
                params: {
                    page
                }
            });

            let data = Object.values(response.data.data);

            template = data.reduce(function(sum, current) {
                if (sum instanceof Object) {
                    sum = getTemplate(sum);
                }
                return sum + getTemplate(current);
            });

            if (response.data.current_page == response.data.last_page) {
                $(btnBookLoad).hide(300, function() {
                    $(this).remove();
                });
            }

            template = $.parseHTML(template);
            $(template).appendTo(tableOfBooks).hide();
            $(template).show(400);
            page++;

        } catch (error) {
            console.error(error);
        }
    }

    function getTemplate(data)
    {
        return `
            <tr>
                <td>${data.age}</td>
                <td>${data.eyeColor}</td>
                <td>${data.name}</td>
                <td>${data.gender}</td>
                <td>${data.company}</td>
                <td>${data.email}</td>
                <td>${data.phone}</td>
                <td>${data.address}</td>
            </tr>
        `;
    }
})();
