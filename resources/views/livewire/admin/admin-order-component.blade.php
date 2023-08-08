<div>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        /* body{background-color: #eeeeee;font-family: 'Open Sans',serif} */
        /* .container{marg  in-top:50px;margin-bottom: 50px} */

        .detail{
            background: #00006c !important;
            color: #fff !important;
        }

        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }

        .txt-bl {
            color: #000;
            font-size: 26px !important;
        }

        .card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}
        .card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px;margin-left: 10px;
        width: 72vw; max-width:72vw;
        }

        .track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #00006c}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #00006c;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #00006c;border-color: #00006c;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #00006c;border-color: #00006c;border-radius: 1px}

        /*!
 * Advanced Boostrap Sidebar
 * Copyright 2019  nkm_swot(envato)

 ** Styles
    big icon menu     - big-icon-menu
    icon menu         - icon-menu
    icon + text menu  - icon-text

  ** Sidebar Themes
    blue    - blue-theme
    green   - green-theme
    orange  - orange-theme
    red     - red-theme
    purple  - purple-theme
    greenblue - bluegreen-theme
    dark   - dark-theme
    light - light-theme

    ** Topbar Themes
    blue    - blue-theme
    green   - green-theme
    orange  - orange-theme
    red     - red-theme
    purple  - purple-theme
    greenblue - menu-greenblue-theme
    dark   - dark-theme
    light - light-theme
*/


/*
8. documentation
9. screenshot
10. envato content
11. envato submission

*/
/* main body content */

/* body {
    overflow-x: hidden;
    padding-top: 50px;
} */

#feature-content .panel {
    border-radius: 10px;
    background: #202938;
    color: white;
    border: none;
}

#feature-content .panel:hover {
    background-color: #45536b;
    color: white;
}


/* Bootstrap sidebar Toggle */

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 50px;
}


/* Bootstrap sidebar styles */

#bootstrap-sidebar {
    z-index: 1000;
    position: fixed;
    left: 50px;
    width: 0;
    /* height: 100%; */
    height: 47vh;
    margin-left: -50px;
    overflow-y: auto;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    opacity: 0.5;
}

#wrapper.toggled #bootstrap-sidebar {
    width: 20%;
}

#main-page-content {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #main-page-content {
    position: absolute;
    margin-right: -50px;
}


/* Bootstrap Sidebar Navigation Styles */

.sidebar-nav {
    position: absolute;
    top: 10px;
    min-width: 200px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 10px;
    line-height: 10px;
    margin-bottom: 10px;
    padding-bottom: 5px;
}

.sidebar-nav li a {
    text-decoration: none;
    color: #FCFFF5;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    opacity: 0.5;
}

.sidebar-nav li a:hover,
.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav li.active {
    background: rgba(255, 255, 255, 0.2);
}

.sidebar-nav li a.active {
    background: rgba(255, 255, 255, 0.2);
}

.sidebar-nav li ul li a:hover {
    text-decoration: underline;
    background: transparent;
}

ul.collapse {
    padding-top: 5px;
}

ul.collapse li,
ul.collapsing li,
ul.in li {
    list-style: none;
    border: none;
    padding-top: 5px;
}

@media(min-width:768px) {
    /* you can adjust here for right main content spacing */
    #wrapper {
        padding-left: 4%;
        /* for small icon menu  */
        padding-left: 6%;
        /* for big icon menu */
        padding-left: 10%;
        /* for text icon menu */
        position: relative;
    }
    #wrapper.toggled {
        padding-left: 0;
    }
    #bootstrap-sidebar.big-icon-menu {
        /* width: 100px; */
        width: 100px;
    }
    #bootstrap-sidebar.icon-menu {
        width: 60px;
    }
    #bootstrap-sidebar.text-menu {
        width: 150px;
        font-size: 110%;
        padding: 5px;
    }
    #wrapper.toggled #bootstrap-sidebar {
        width: 0;
    }
    #main-page-content {
        padding: 20px;
        position: relative;
    }
    #wrapper.toggled #main-page-content {
        position: relative;
        margin-right: 0;
    }
}


/* Menu Icon Sizes */

.big-icon-menu {
    font-size: 45px;
}

.big-icon-menu ul.sidebar-nav li a span.menu-text,
.icon-menu ul.sidebar-nav li a span.menu-text {
    display: none;
}

.icon-menu {
    font-size: 20px;
}


/* Themes */


/* Dark Theme */

.dark-theme {
    background: #202938;
}


/* Blue Theme */

.blue-theme {
    background: #3c578b;
}


/* Green Theme */

.green-theme {
    background: #13801A;
}


/* Red Theme */

.red-theme {
    background: #BF1A17;
}


/* Orange Theme */

.orange-theme {
    background: #E66012;
}


/* Purple Theme */

.purple-theme {
    background: #5C257F;
}


/* Bluegreen Theme */

.bluegreen-theme {
    background: #1F806B;
}


/* Light Theme */

.light-theme {
    /* background: #E5E8D5; */
    background: #eee;
}

.light-theme ul.sidebar-nav li a {
    color: #202938;
}

.light-theme ul.sidebar-nav li.active a {
    color: #E5E8D5;
}

.light-theme ul.sidebar-nav li.active {
    background: #202938;
}


/* blue navigation bar */

.navbar-blue {
    background-color: #3c578b;
    border-color: #2f3133;
}

.navbar-blue .navbar-brand {
    color: #ecf0f1;
}

.navbar-blue .navbar-brand:hover,
.navbar-blue .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-blue .navbar-text {
    color: #ecf0f1;
}

.navbar-blue .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-blue .navbar-nav>li>a:hover,
.navbar-blue .navbar-nav>li>a:focus {
    color: #ecdbff;
    background-color: #2f3133;
}

.navbar-blue .navbar-nav>.active>a,
.navbar-blue .navbar-nav>.active>a:hover,
.navbar-blue .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #2f3133;
}

.navbar-blue .navbar-nav>.open>a,
.navbar-blue .navbar-nav>.open>a:hover,
.navbar-blue .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #2f3133;
}

.navbar-blue .navbar-toggle {
    border-color: #2f3133;
}

.navbar-blue .navbar-toggle:hover,
.navbar-blue .navbar-toggle:focus {
    background-color: #2f3133;
}

.navbar-blue .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-blue .navbar-collapse,
.navbar-blue .navbar-form {
    border-color: #ecf0f1;
}

.navbar-blue .navbar-link {
    color: #ecf0f1;
}

.navbar-blue .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-blue .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-blue .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-blue .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-blue .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-blue .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-blue .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #2f3133;
    }
}


/* Green navigation bar */

.navbar-green {
    background-color: #13801a;
    border-color: #0eab13;
}

.navbar-green .navbar-brand {
    color: #ecf0f1;
}

.navbar-green .navbar-brand:hover,
.navbar-green .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-green .navbar-text {
    color: #ecf0f1;
}

.navbar-green .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-green .navbar-nav>li>a:hover,
.navbar-green .navbar-nav>li>a:focus {
    background-color: #0eab13;
    color: #ecdbff;
}

.navbar-green .navbar-nav>.active>a,
.navbar-green .navbar-nav>.active>a:hover,
.navbar-green .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #0eab13;
}

.navbar-green .navbar-nav>.open>a,
.navbar-green .navbar-nav>.open>a:hover,
.navbar-green .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #0eab13;
}

.navbar-green .navbar-toggle {
    border-color: #0eab13;
}

.navbar-green .navbar-toggle:hover,
.navbar-green .navbar-toggle:focus {
    background-color: #0eab13;
}

.navbar-green .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-green .navbar-collapse,
.navbar-green .navbar-form {
    border-color: #ecf0f1;
}

.navbar-green .navbar-link {
    color: #ecf0f1;
}

.navbar-green .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-green .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-green .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-green .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-green .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-green .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-green .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #0eab13;
    }
}


/* Orange navigation bar */

.navbar-orange {
    background-color: #e66012;
    border-color: #b4480a;
}

.navbar-orange .navbar-brand {
    color: #ecf0f1;
}

.navbar-orange .navbar-brand:hover,
.navbar-orange .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-orange .navbar-text {
    color: #ecf0f1;
}

.navbar-orange .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-orange .navbar-nav>li>a:hover,
.navbar-orange .navbar-nav>li>a:focus {
    color: #ecdbff;
    background-color: #b4480a;
}

.navbar-orange .navbar-nav>.active>a,
.navbar-orange .navbar-nav>.active>a:hover,
.navbar-orange .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #b4480a;
}

.navbar-orange .navbar-nav>.open>a,
.navbar-orange .navbar-nav>.open>a:hover,
.navbar-orange .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #b4480a;
}

.navbar-orange .navbar-toggle {
    border-color: #b4480a;
}

.navbar-orange .navbar-toggle:hover,
.navbar-orange .navbar-toggle:focus {
    background-color: #b4480a;
}

.navbar-orange .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-orange .navbar-collapse,
.navbar-orange .navbar-form {
    border-color: #ecf0f1;
}

.navbar-orange .navbar-link {
    color: #ecf0f1;
}

.navbar-orange .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-orange .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-orange .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-orange .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-orange .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-orange .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-orange .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #b4480a;
    }
}


/* Red navigation bar */

.navbar-red {
    background-color: #bf1a17;
    border-color: #db4441;
}

.navbar-red .navbar-brand {
    color: #ecf0f1;
}

.navbar-red .navbar-brand:hover,
.navbar-red .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-red .navbar-text {
    color: #ecf0f1;
}

.navbar-red .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-red .navbar-nav>li>a:hover,
.navbar-red .navbar-nav>li>a:focus {
    color: #ecdbff;
    background-color: #db4441;
}

.navbar-red .navbar-nav>.active>a,
.navbar-red .navbar-nav>.active>a:hover,
.navbar-red .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #db4441;
}

.navbar-red .navbar-nav>.open>a,
.navbar-red .navbar-nav>.open>a:hover,
.navbar-red .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #db4441;
}

.navbar-red .navbar-toggle {
    border-color: #db4441;
}

.navbar-red .navbar-toggle:hover,
.navbar-red .navbar-toggle:focus {
    background-color: #db4441;
}

.navbar-red .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-red .navbar-collapse,
.navbar-red .navbar-form {
    border-color: #ecf0f1;
}

.navbar-red .navbar-link {
    color: #ecf0f1;
}

.navbar-red .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-red .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-red .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-red .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-red .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-red .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-red .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #db4441;
    }
}


/* Purple navigation bar */

.navbar-purple {
    background-color: #5c257f;
    border-color: #9254ba;
}

.navbar-purple .navbar-brand {
    color: #ecf0f1;
}

.navbar-purple .navbar-brand:hover,
.navbar-purple .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-purple .navbar-text {
    color: #ecf0f1;
}

.navbar-purple .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-purple .navbar-nav>li>a:hover,
.navbar-purple .navbar-nav>li>a:focus {
    color: #ecdbff;
    background-color: #9254ba;
}

.navbar-purple .navbar-nav>.active>a,
.navbar-purple .navbar-nav>.active>a:hover,
.navbar-purple .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #9254ba;
}

.navbar-purple .navbar-nav>.open>a,
.navbar-purple .navbar-nav>.open>a:hover,
.navbar-purple .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #9254ba;
}

.navbar-purple .navbar-toggle {
    border-color: #9254ba;
}

.navbar-purple .navbar-toggle:hover,
.navbar-purple .navbar-toggle:focus {
    background-color: #9254ba;
}

.navbar-purple .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-purple .navbar-collapse,
.navbar-purple .navbar-form {
    border-color: #ecf0f1;
}

.navbar-purple .navbar-link {
    color: #ecf0f1;
}

.navbar-purple .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-purple .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-purple .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-purple .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-purple .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-purple .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-purple .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #9254ba;
    }
}


/* GreenBlue navigation bar */
.navbar-greenblue {
    background-color: #1f806b;
    border-color: #076d57;
}

.navbar-greenblue .navbar-brand {
    color: #ecf0f1;
}

.navbar-greenblue .navbar-brand:hover,
.navbar-greenblue .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-greenblue .navbar-text {
    color: #ecf0f1;
}

.navbar-greenblue .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-greenblue .navbar-nav>li>a:hover,
.navbar-greenblue .navbar-nav>li>a:focus {
    color: #ecdbff;
    background-color: #076d57;
}

.navbar-greenblue .navbar-nav>.active>a,
.navbar-greenblue .navbar-nav>.active>a:hover,
.navbar-greenblue .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #076d57;
}

.navbar-greenblue .navbar-nav>.open>a,
.navbar-greenblue .navbar-nav>.open>a:hover,
.navbar-greenblue .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #076d57;
}

.navbar-greenblue .navbar-toggle {
    border-color: #076d57;
}

.navbar-greenblue .navbar-toggle:hover,
.navbar-greenblue .navbar-toggle:focus {
    background-color: #076d57;
}

.navbar-greenblue .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-greenblue .navbar-collapse,
.navbar-greenblue .navbar-form {
    border-color: #ecf0f1;
}

.navbar-greenblue .navbar-link {
    color: #ecf0f1;
}

.navbar-greenblue .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-greenblue .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-greenblue .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-greenblue .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-greenblue .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-greenblue .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-greenblue .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #076d57;
    }
}


/* Dark navigation bar */

.navbar-dark {
    background-color: #202938;
    border-color: #45536b;
}

.navbar-dark .navbar-brand {
    color: #ecf0f1;
}

.navbar-dark .navbar-brand:hover,
.navbar-dark .navbar-brand:focus {
    color: #ecdbff;
}

.navbar-dark .navbar-text {
    color: #ecf0f1;
}

.navbar-dark .navbar-nav>li>a {
    color: #ecf0f1;
}

.navbar-dark .navbar-nav>li>a:hover,
.navbar-dark .navbar-nav>li>a:focus {
    color: #ecdbff;
    background-color: #45536b;
}

.navbar-dark .navbar-nav>.active>a,
.navbar-dark .navbar-nav>.active>a:hover,
.navbar-dark .navbar-nav>.active>a:focus {
    color: #ecdbff;
    background-color: #45536b;
}

.navbar-dark .navbar-nav>.open>a,
.navbar-dark .navbar-nav>.open>a:hover,
.navbar-dark .navbar-nav>.open>a:focus {
    color: #ecdbff;
    background-color: #45536b;
}

.navbar-dark .navbar-toggle {
    border-color: #45536b;
}

.navbar-dark .navbar-toggle:hover,
.navbar-dark .navbar-toggle:focus {
    background-color: #45536b;
}

.navbar-dark .navbar-toggle .icon-bar {
    background-color: #ecf0f1;
}

.navbar-dark .navbar-collapse,
.navbar-dark .navbar-form {
    border-color: #ecf0f1;
}

.navbar-dark .navbar-link {
    color: #ecf0f1;
}

.navbar-dark .navbar-link:hover {
    color: #ecdbff;
}

@media (max-width: 767px) {
    .navbar-dark .navbar-nav .open .dropdown-menu>li>a {
        color: #ecf0f1;
    }
    .navbar-dark .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-dark .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #ecdbff;
    }
    .navbar-dark .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-dark .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-dark .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #ecdbff;
        background-color: #45536b;
    }
}


/* Light navigation bar */

.navbar-light {
    background-color: #ffffff;
    border-color: #3c3f43;
}

.navbar-light .navbar-brand {
    color: #363b3c;
}

.navbar-light .navbar-brand:hover,
.navbar-light .navbar-brand:focus {
    color: #fdfdfd;
}

.navbar-light .navbar-text {
    color: #363b3c;
}

.navbar-light .navbar-nav>li>a {
    color: #363b3c;
}

.navbar-light .navbar-nav>li>a:hover,
.navbar-light .navbar-nav>li>a:focus {
    color: #fdfdfd;
    background-color: #3c3f43;
}

.navbar-light .navbar-nav>.active>a,
.navbar-light .navbar-nav>.active>a:hover,
.navbar-light .navbar-nav>.active>a:focus {
    color: #fdfdfd;
    background-color: #3c3f43;
}

.navbar-light .navbar-nav>.open>a,
.navbar-light .navbar-nav>.open>a:hover,
.navbar-light .navbar-nav>.open>a:focus {
    color: #fdfdfd;
    background-color: #3c3f43;
}

.navbar-light .navbar-toggle {
    border-color: #3c3f43;
}

.navbar-light .navbar-toggle:hover,
.navbar-light .navbar-toggle:focus {
    background-color: #3c3f43;
}

.navbar-light .navbar-toggle .icon-bar {
    background-color: #363b3c;
}

.navbar-light .navbar-collapse,
.navbar-light .navbar-form {
    border-color: #363b3c;
}

.navbar-light .navbar-link {
    color: #363b3c;
}

.navbar-light .navbar-link:hover {
    color: #fdfdfd;
}

@media (max-width: 767px) {
    .navbar-light .navbar-nav .open .dropdown-menu>li>a {
        color: #363b3c;
    }
    .navbar-light .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-light .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #fdfdfd;
    }
    .navbar-light .navbar-nav .open .dropdown-menu>.active>a,
    .navbar-light .navbar-nav .open .dropdown-menu>.active>a:hover,
    .navbar-light .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #fdfdfd;
        background-color: #3c3f43;
    }
}

.icon-big{font-size: 40px;}
    </style>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
    <script src="js/sidebar.js?ver=2"></script>


    <div class="container">
            </nav>
            <div id="bootstrap-sidebar" class="light-theme big-icon-menu">
            <ul class="sidebar-nav">
                <li class="active"> <a href="#" wire:click.prevent="orderFilter('all')"><i class="fa fa-list-alt" aria-hidden="true" title="All"></i><span class="menu-text">All</span></a>
                </li>
                <li> <a href="#"><i class="fa fa-pencil-square" aria-hidden="true" title="Ordered"></i><span class="menu-text">Ordered</span></a>
                </li>
                {{-- ori --}}
                <li> <a href="#" wire:click.prevent="orderFilter('paid')"><i class="fa fa fa-money" aria-hidden="true" title="Paid" type="text"></i> <span class="menu-text">Paid</span></a>
                </li>

                {{-- <li> <a href="{{route('admin.orders',['status'=>'paid'])}}}}"><i class="fa fa fa-money" aria-hidden="true" title="Paid" type="text"></i> <span class="menu-text">Paid</span></a>
                </li> --}}


                <li> <a href="#"><i class="fa fa-check-square" aria-hidden="true" title="Confirmed"></i> <span class="menu-text">Approved</span></a>
                </li>
                <li> <a href="#"><i class="fa fa-truck" aria-hidden="true" title="Delivered"></i></span> <span class="menu-text">Delivered</span></a>
                </li>
            </ul>
            </div>

            <article class="card">
                <header class="card-header ml-3"><strong>All Orders</strong></header>
                <div class="card-body ml-3">
                    @foreach ($orders as $order)

                    <article class="card">

                        <div class="card-body row ml-15">
                            <h5><strong>Order ID: </strong>{{$order->id}}</h5>
                            <div class="col mt-08 mb-08"> <strong>Status:</strong> <span class="label label-primary lb-sm">{{$order->status}}</span></div>
                            <div class="col mb-08"> <strong>Shipping by:</strong> {{$order->service}}
                            <a href="/admin/orders" class="detail btn pull-right mr-3" data-abc="true"> <i class="fa fa-chevron-right"></i> Order Detail</a>
                        </div>

                        <div class="track">
                            <div class="step active" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Created</span> {{$order->created_at}}</div>
                            @if($order->paid_date)
                                <div class="step active" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Paid</span> {{$order->paid_date}}</div>
                            @else
                                <div class="step" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Paid</span> </div>
                            @endif

                            <div class="step" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Approved </span> </div>
                            <div class="step" style="width: 25vw; max-width:25vw;"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
                        </div>

                    </article>

                    <hr>

                    @endforeach
                </div>
                {{$orders->links()}}
            </article>


    </div>


</div>
