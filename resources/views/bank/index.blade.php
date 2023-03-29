


<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
  @include('navbar')

<h2>All Bank</h2>

<table>
  <tr>
    <th>Bank Name</th>
    <th>Grade</th>
    <th>Action</th>
  </tr>
  <tbody>

    @foreach($banks as $bank)

        <tr>
            <td> {{ $bank->bankName}} </td>
            <td> {{ $bank->grade  }} </td>
            <td>
                <a href="{{ route('bank.edit', $bank->id )}}" class="btn btn-outline-primary btn-sm" style="color: black"> Edit </a>
                <hr>
                {{-- <a href="{{ route('bank.destroy',$bank->id)}}" class="btn btn-outline-danger btn-sm"> Delete </a>                  --}}
                <form action="{{ route('bank.destroy', $bank->id) }}" method="post">
                 @method('delete')
                 @csrf
                  <input type="submit" value="Delete" class="btn btn-danger btn-block">       
               </form>  
            </td>

        </tr>
    @endforeach



    </tbody>
</table>

</body>
</html>

