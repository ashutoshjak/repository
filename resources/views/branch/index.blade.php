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

<h2>All Branch</h2>

<table>
  <tr>
    <th>Bank Name</th>
    <th>Branch Address</th>
    <th>Branch Phone</th>
    <th>Bank Name</th>
    <th>Action</th>
  </tr>
  <tbody>

    @foreach($branches as $branch)

        <tr>
            <td> {{$branch->branchName}} </td>
            <td> {{$branch->branchAddress}} </td>
            <td> {{$branch->phone}} </td>
            <td> {{$branch->bank->bankName}} </td>
            
            <td>
                <a href="{{ route('branch.edit', $branch->id )}}" class="btn btn-outline-primary btn-sm" style="color: black"> Edit </a>
                <hr>
                {{-- <a href="{{ route('bank.destroy',$bank->id)}}" class="btn btn-outline-danger btn-sm"> Delete </a>                  --}}
                <form action="{{ route('branch.destroy', $branch->id) }}" method="post">
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

