<style>
    * {
        box-sizing: border-box;
    }

    .navlink {
        padding: 0.2cm;
        text-decoration: none;
        color: #0066CC;
        position: absolute;
    }

    .navlink:hover {
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .link, .link:visited {
        text-decoration: none;
        color: #0066CC;
    }

    .link:hover {
        text-decoration: underline;
    }

    #divider {
        position: absolute;
        top: 13%;
        background-color: silver;
        width: 2px;
        height: 80%;
        border-radius: 1px;
    }
    

</style>


<div class="container" style="width:100%; display:inline-block; position: relative;">
    <a href="/" class="navlink" id="homelink">Home</a>
    <a href="/user-request-list" class="navlink" style="left:1.49cm;">My Request History</a>
    <a href="/support" class="navlink" style="left:5.44cm;">Support</a>
    <div id="divider" style="left: 7.5cm;"></div>
    <a href="/admin-request-list" class="navlink" style="left:7.75cm;">All Requests</a>
    <span style="float:right; padding: 0.2cm;">
        @include('template.login')
    </span>
    </ul>
</div>