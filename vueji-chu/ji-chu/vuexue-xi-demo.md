这篇文章的内容是在通读了前面的《Vue.js——60分钟快速入门》之后做的一个demo。

## html文件

注意：

1. &lt;script src="js/**vue.js**"&gt;&lt;/script&gt;是Vue脚本，从网上可以下载到。
2. &lt;link rel="stylesheet" href="css/**vue-demo.css**"&gt;是本文用到的样式表。
3. &lt;script src="js/**vue-demo.js**"&gt;&lt;/script&gt;是本文用到的js文件。

```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vue demo</title>
        <script src="js/vue.js"></script>
        <link rel="stylesheet" href="css/vue-demo.css">
    </head>

    <body>
        <div id="app">
            <fieldset>
                <legend>
                    create new person
                </legend>

                <div class="form-group">
                    <label>name:</label>
                    <input type="text" v-model="newPerson.name">
                </div>
                <div class="form-group">
                    <label>age:</label>
                    <input type="text" v-model="newPerson.age">
                </div>
                <div class="form-group">
                    <label>sex:</label>
                    <select v-model="newPerson.sex">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label></label>
                    <button @click="createPerson">create</button>
                </div>
            </fieldset>

            <table>
                <thead>
                    <tr>
                        <th>name</th>
                        <th>age</th>
                        <th>sex</th>
                        <th>delete</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="person in people">
                        <td>{{person.name}}</td>
                        <td>{{person.age}}</td>
                        <td>{{person.sex}}</td>
                        <td v-bind:class="'text-center'">
                            <button v-on:click="deletePerson($index)">delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <script src="js/vue-demo.js"></script>

    </body>
</html>
```

## vue-demo.js

```js
var vmDemo = new Vue({
    el: "#app",
    data: {
        newPerson:
            {
                name: '',
                age: 0,
                sex: 'male'
            },
        people: [
            {
                name: 'steven',
                age: 22,
                sex: 'male'
            },
            {
                name: 'tom',
                age: 22,
                sex: 'male'
            },
            {
                name: 'jack',
                age: 22,
                sex: 'male'
            },
            {
                name: 'lily',
                age: 22,
                sex: 'male'
            }
        ]
    },
    methods: {
        createPerson: function () {
            if(this.newPerson.name === "") {
                alert("用户名为空！");
                return ;
            }
            this.people.push(this.newPerson);
            this.newPerson = {name: '', age: 0, sex: 'male'}
        },
        deletePerson: function (index) {
            this.people.splice(index,1);
        }
    }
});
```

## vue-demo.css

```css
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

html {
    font-size: 12px;
    font-family: Ubuntu, simHei, sans-serif;
    font-weight: 400
}

body {
    font-size: 1rem
}

table,
td,
th {
    border-collapse: collapse;
    border-spacing: 0
}

table {
    width: 100%
}

td,
th {
    border: 1px solid #bcbcbc;
    padding: 5px 10px
}

th {
    background: #42b983;
    font-size: 1.2rem;
    font-weight: 400;
    color: #fff;
    cursor: pointer
}

tr:nth-of-type(odd) {
    background: #fff
}

tr:nth-of-type(even) {
    background: #eee
}

fieldset {
    border: 1px solid #BCBCBC;
    padding: 15px;
}

input {
    outline: none
}

input[type=text] {
    border: 1px solid #ccc;
    padding: .5rem .3rem;
}

input[type=text]:focus {
    border-color: #42b983;
}

button {
    outline: none;
    padding: 5px 8px;
    color: #fff;
    border: 1px solid #BCBCBC;
    border-radius: 3px;
    background-color: #009A61;
    cursor: pointer;
}
button:hover{
    opacity: 0.8;
}

#app {
    margin: 0 auto;
    max-width: 640px
}

.form-group {
    margin: 10px;
}

.form-group > label {
    display: inline-block;
    width: 10rem;
    text-align: right;
}

.form-group > input,
.form-group > select {
    display: inline-block;
    height: 2.5rem;
    line-height: 2.5rem;
}

.text-center{
    text-align: center;
}

.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 21px 0;
    border-radius: 3px;
}

.pagination > li {
    display: inline;
}

.pagination > li > a {
    position: relative;
    float: left;
    padding: 6px 12px;
    line-height: 1.5;
    text-decoration: none;
    color: #009a61;
    background-color: #fff;
    border: 1px solid #ddd;
    margin-left: -1px;
    list-style: none;
}

.pagination > li > a:hover {
    background-color: #eee;
}

.pagination .active {
    color: #fff;
    background-color: #009a61;
    border-left: none;
    border-right: none;
}

.pagination .active:hover {
    background: #009a61;
    cursor: default;
}

.pagination > li:first-child > a .p {
    border-bottom-left-radius: 3px;
    border-top-left-radius: 3px;
}

.pagination > li:last-child > a {
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
}
```

## 实现效果

![](/assets/vue/vue-demo.png)

