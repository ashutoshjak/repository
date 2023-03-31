<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Branch Form</title>
</head>
<style>
    form {
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;

  margin: 0 auto;
}

table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          text-align: center;
          margin-top: 30px;
          width: 1000px
          
        }
        

        
h2 {
  text-align: center;
  font-size: 24px;
  margin-top: 0;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  box-sizing: border-box;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  float: right;
}


input[type="submit"]:hover {
  background-color: #45a049;
}

</style>
<body>
    @include('navbar')
    <form action="{{ route('bank.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="rowCount" name="rowCount" value="0">
      <table id="table1">
        <thead>
          <h2>Add Bank</h2>
          <tr>
            <td><label for="exampleInputEmail1">Enter Bank Name</label></td>
            <td><label for="exampleInputEmail1">Enter Class</label></td>
          </tr>
        </thead>
        <tbody id="myBody">
        </tbody>
        <tfoot>
          <tr>
            <td>
              <div><input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Bank Name" name="bankName[]"></div>
            </td>
            <td>
              <div><input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Grade Name" name="grade[]"></div>
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit" class="btn btn-primary">Submit</button>
            </td>
            <td>
              <button type="button" style="margin-left:15px;"  onclick="myCreateFunction()">Add</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </form>

    
    
      
     
    
    


    <script>
      function myCreateFunction() {
        var tbody = document.getElementById("myBody");
        var row = tbody.insertRow(-1);
        var rowCount = document.getElementById("rowCount");
        rowCount.value = parseInt(rowCount.value) + 1;
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = '<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Bank Name" name="bankName[]">';
        cell2.innerHTML = '<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Grade Name" name="grade[]">';
        cell1.style.padding = "20px";
      }
    </script>
    
  </body>
</html>








