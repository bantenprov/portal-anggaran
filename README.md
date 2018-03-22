# Anggaran

[![Join the chat at https://gitter.im/portal-anggaran/Lobby](https://badges.gitter.im/portal-anggaran/Lobby.svg)](https://gitter.im/portal-anggaran/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/portal-anggaran/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/portal-anggaran/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/portal-anggaran/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/portal-anggaran/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/portal-anggaran/v/stable)](https://packagist.org/packages/bantenprov/portal-anggaran)
[![Total Downloads](https://poser.pugx.org/bantenprov/portal-anggaran/downloads)](https://packagist.org/packages/bantenprov/portal-anggaran)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/portal-anggaran/v/unstable)](https://packagist.org/packages/bantenprov/portal-anggaran)
[![License](https://poser.pugx.org/bantenprov/portal-anggaran/license)](https://packagist.org/packages/bantenprov/portal-anggaran)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/portal-anggaran/d/monthly)](https://packagist.org/packages/bantenprov/portal-anggaran)
[![Daily Downloads](https://poser.pugx.org/bantenprov/portal-anggaran/d/daily)](https://packagist.org/packages/bantenprov/portal-anggaran)

Anggaran

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/portal-anggaran:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/portal-anggaran:v0.1
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/portal-anggaran.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\Anggaran\AnggaranServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=anggaran-seeds
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovAnggaranSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=anggaran-assets
$ php artisan vendor:publish --tag=anggaran-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
         path: '/dashboard/anggaran',
         components: {
            main: resolve => require(['./components/views/bantenprov/anggaran/DashboardAnggaran.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
          },
          meta: {
            title: "Anggaran"
           }
       },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/anggaran',
            components: {
                main: resolve => require(['./components/bantenprov/anggaran/Anggaran.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Anggaran"
            }
        },
        {
            path: '/admin/anggaran/create',
            components: {
                main: resolve => require(['./components/bantenprov/anggaran/Anggaran.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Anggaran"
            }
        },
        {
            path: '/admin/anggaran/:id',
            components: {
                main: resolve => require(['./components/bantenprov/anggaran/Anggaran.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Anggaran"
            }
        },
        {
            path: '/admin/anggaran/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/anggaran/Anggaran.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Anggaran"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Anggaran',
        link: '/dashboard/anggaran',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Anggaran',
        link: '/admin/anggaran',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Anggaran

import Anggaran from './components/bantenprov/anggaran/Anggaran.chart.vue';
Vue.component('echarts-anggaran', Anggaran);

import AnggaranKota from './components/bantenprov/anggaran/AnggaranKota.chart.vue';
Vue.component('echarts-anggaran-kota', AnggaranKota);

import AnggaranTahun from './components/bantenprov/anggaran/AnggaranTahun.chart.vue';
Vue.component('echarts-anggaran-tahun', AnggaranTahun);

import AnggaranAdminShow from './components/bantenprov/anggaran/AnggaranAdmin.show.vue';
Vue.component('admin-view-anggaran-tahun', AnggaranAdminShow);

//== Echarts Group Egoverment

import AnggaranBar01 from './components/views/bantenprov/anggaran/AnggaranBar01.vue';
Vue.component('anggaran-bar-01', AnggaranBar01);

import AnggaranPie01 from './components/views/bantenprov/anggaran/AnggaranPie01.vue';
Vue.component('anggaran-pie-01', AnggaranPie01);

//==

import AnggaranBar02 from './components/views/bantenprov/anggaran/AnggaranBar02.vue';
Vue.component('anggaran-bar-02', AnggaranBar02);

import AnggaranPie02 from './components/views/bantenprov/anggaran/AnggaranPie02.vue';
Vue.component('anggaran-pie-02', AnggaranPie02);

//== mini bar charts
import AnggaranBar03 from './components/views/bantenprov/anggaran/AnggaranBar03.vue';
Vue.component('anggaran-bar-03', AnggaranBar03);

//== mini pie charts

import AnggaranPie03 from './components/views/bantenprov/anggaran/AnggaranPie03.vue';
Vue.component('anggaran-pie-03', AnggaranPie03);

//== Anggaran dan Realisasi APBN

import AnggaranRealisasiAPBNPie from './components/views/bantenprov/anggaran/AnggaranRealisasiAPBNPie.vue';
Vue.component('anggaran-realisasi-apbn-pie', AnggaranRealisasiAPBNPie);

```
