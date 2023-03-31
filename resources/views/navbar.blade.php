{{-- <style>
    nav {
  background-color: #333;
  
}


ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

li {
  margin: 0 10px;
}

a {
  display: block;
  color: #fff;
  text-decoration: none;
  padding: 10px;
}

a:hover {
  background-color: #555;
}

</style>

<nav>
    <ul>
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('bank.create')}}">Create Bank</a></li>
      <li><a href="{{route('branch.create')}}">Create Branch</a></li>
    </ul>
  </nav>
   --}}

   <style>
    
    
    .navbar {
      overflow: hidden;
      background-color: #333;
    }
    
    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    
    .dropdown {
      float: left;
      overflow: hidden;
    }
    
    .dropdown .dropbtn {
      font-size: 16px;  
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }
    
    .navbar a:hover, .dropdown:hover .dropbtn {
      background-color: red;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    </style>
    </head>
    <body>
    
      <div class="navbar">
        <a href="{{route('home')}}">Home</a>
        <div class="dropdown">
          <button class="dropbtn">Bank
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="{{route('bank.create')}}">Create Bank</a>
            <a href="{{route('bank.index')}}">View All Bank</a>
          </div>
        </div> 
        <div class="dropdown">
          <button class="dropbtn">Branch
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="{{route('branch.create')}}">Create Branch</a>
            <a href="{{route('branch.index')}}">View All Branch</a>
          
          </div>
        </div> 
      </div>
    
    </body>
    </html>
    