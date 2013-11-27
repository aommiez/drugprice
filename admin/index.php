<!DOCTYPE html><html lang="en"><head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">window.alert = function(){}</script>
</head>
<body style="">
<div class="well">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Add User</a></li>
        <li class=""><a href="#addHostpital" data-toggle="tab">Add Hospital</a></li>
        <li class=""><a href="#userList" data-toggle="tab">User List</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="home">
            <form id="tab">
                <label>First Name</label>
                <input type="text" value="John" class="input-xlarge">
                <label>Last Name</label>
                <input type="text" value="Smith" class="input-xlarge">
                <label>Email</label>
                <input type="text" value="you@yourcompany.com" class="input-xlarge">
                <label>Password</label>
                <input type="password" value="123456" class="input-xlarge">

                <label>Hostpital</label>
                <select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
                    <option value="-12.0">1</option>
                    <option value="-11.0">2</option>
                    <option value="-10.0">3</option>
                    <option value="-9.0">4</option>
                    <option selected="selected" value="-8.0">5</option>

                </select>
                <div>
                    <button class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="addHostpital">
            <form id="tab2">
                <label>Add Hostpital</label>
                <input type="hostpital" class="input-xlarge">
                <div><br>
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="userList">
            <form id="tab2">
                <label>User List</label>
                asdsdas
            </form>
        </div>
    </div>
</div></body></html>