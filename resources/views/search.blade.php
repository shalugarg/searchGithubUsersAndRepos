<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .styled-table {
    border-collapse: collapse;
    margin: 60px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 27px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 130px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 100%;
  position: relative;
  top: 17%;
  left: 70%;
  transform: translate(-35%, -157%);
}
        </style>
    </head>
    <body>
        <div class="wrap">
            <div class="search">
                <form action="/search/user/{name}" method="GET">
                    <input type="text" name="search" required class="searchTerm" placeholder="Search User .....">
                    <button type="submit" class="searchButton">
                        Search<i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Profile Image</th>
                    <th>Username</th>
                    <th>Repositories</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($users))
            @foreach ($users['items'] as $user)
                <tr>
                    <td><img src="{{ $user['avatar_url'] }}" alt="profile Pic" height="100" width="100"></td>
                    <td>{{ $user['login'] }}</td>
                    <td><a href="/user/repos/{{$user['login']}}"> {{ $user['total_repos'] }}</a>
</td>
                </tr>
            @endforeach
            @else 
            <tr>
                    <th><h2>No users found</h2></th>
                    
                </tr>
                <h2>No users found</h2>
            @endif
                
            </tbody>
        </table>
</div>  
    </body>
</html>
