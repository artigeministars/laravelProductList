
Laravel Vue 3 ( composition api only) bootstrap small project. 
Product List.

-----------------------------------------------------
laravel installation: 
-----------------------------------------------------

composer create-project laravel/laravel [project-name]
cd [project-name]

cp .env.example .env

chmod -R 777 bootstap/cache storage 

laradock installation:

git clone https://github.com/Laradock/laradock.git

cp .env.example .env

change DB_HOST=mysql 

run : 

docker-compose up -d nginx mysql workspace 

--------------------------------------------------
vue installation:
--------------------------------------------------

remove following from package.json :


    vue
    vue-template-compiler
    laravel-mix

npm i -D laravel-mix@next vue@next @vue/compiler-sfc vue-loader@next
npm i

webpack.mix.js :

add vue() 

mix.js('resources/js/app.js', 'public/js').vue();

in resources/js/app.js :

import { createApp } from 'vue';
import App from './components/App.vue'
createApp(App).mount("#app")

-----------------------------------------------------
bootstrap installation:
-----------------------------------------------------

npm install bootstrap jquery popper.js
// because bootstrap written by sass
npm i -D sass sass-loader lodash node-sass resolve-url-loader
add app.js :

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

open welcome.blade.php add :

<script src="{{asset('js/app.js')}}"></script>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

 after the body.

add div including app id too.


----------------------------------------------------

setup 

----------------------------------------------------

git clone https://github.com/artigeministars/laravelProductList.git

add data folder for mysql 

mkdir data 
chmod -R 777 data 
chmod -R 777 bootstrap/cache storage
cp .env .example .env

cp laradock/.env.example laradock/.env

NOte: if db problem occurs , change DB_HOST=mysql to DB_HOST=0.0.0.0

if you want to db connection outside, port is 3310, after that;

cd laradock 

docker-compose up -d nginx mysql workspace 


