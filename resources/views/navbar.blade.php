<style>
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
  