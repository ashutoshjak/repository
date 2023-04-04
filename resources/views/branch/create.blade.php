{{-- <!DOCTYPE html>
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
  width: 50%;
  margin: 0 auto;
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
    <h2>Add Branch</h2>
    <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Enter Branch Name</label>
            <br>
            <br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Branch Name" name="branchName">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1"> Enter Address</label>
            <br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Branch Address" name="branchAddress">
        </div>
        <br>

        <div class="form-group">
            <label for="exampleInputEmail1"> Enter Phone</label>
            <br>
            <br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone" name="phone">
        </div>
        <br>

        <div class="form-group">
            <label for="exampleInputEmail1"> Select Bank </label>
            <br>
            <select class="form-control" name="bank_id">
                <option> Select </option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}"> {{ $bank->bankName }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html> --}}


{{-- new code --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Form</title>
</head>
<style>
    /* form {
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
} */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  background-color: #f2f2f2;
}

/* Form Styles */

form {
  /* background-color: #f2f2f2; */
  /* border: 1px solid #ccc; */
  border-radius: 5px;
  margin: 0 auto;
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  padding: 10px;
  width: 100%;
}

input[type="submit"] {
  background-color: #4CAF50;
  border: none;
  border-radius: 5px;
  color: white;
  cursor: pointer;
  float: right;
  padding: 10px 20px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

/* Table Styles */

table {
  border: 1px solid black;
  border-collapse: collapse;
  margin-top: 30px;
  text-align: center;
  width: 1000px;
  margin-left: auto;
  margin-right: auto;
}

th, td {
  border: 1px solid black;
  padding: 8px;
}

h2 {
  font-size: 24px;
  margin-top: 0;
  text-align: center;
}

tfoot button {
  margin-left: 15px;
} 

</style>
<body>
    @include('navbar')
   
    <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="rowCount" name="rowCount" value="0">
      <table id="table1">
        <thead>
          <h2>Add Branch</h2>
          <tr>
            <td><label for="exampleInputEmail1">Enter Branch Name</label></td>
            <td><label for="exampleInputEmail1">Enter Branch Address</label></td>
            <td><label for="exampleInputEmail1">Enter Branch Phone</label></td>
            <td><label for="exampleInputEmail1">Choose Bank</label></td>
            <td><label for="exampleInputEmail1">Action</label></td>
          </tr>
        </thead>
        <tbody id="myBody">
        </tbody>
        <tfoot>
          <tr>
            @if (old('branchName') !== null)
            @for ($i = 0; $i < count(old('branchName')); $i++)
            <tr>
              <td>
                <div><input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Branch Name" name="branchName[]" value="{{ old('branchName')[$i] }}"> </div>
                @error('branchName.'.$i)
                 <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </td>
              <td>
                <div><input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Branch Address" name="branchAddress[]" value="{{ old('branchAddress')[$i] }}"></div>
                @error('branchAddress.'.$i)
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
              </td>
              <td>
                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Phone" name="phone[]" value="{{ old('phone')[$i] }}">
                @error('phone.'.$i)
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
              </td>
              <td>
                <select class="form-control" name="bank_id[]">
                  <option> Select </option>
                  @foreach($banks as $bank)
                      {{-- <option value="{{ $bank->id }}"> {{ $bank->bankName }}</option> --}}
                      <option value="{{ $bank->id }}" @if(old('bank_id.'.$i) == $bank->id) selected @endif> {{ $bank->bankName }}</option>
                  @endforeach
              </select>
              @error('bank_id.'.$i)
              <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </td>
              <td>
                <button type="button" style="margin-left:15px;" onclick="myDeleteFunction(this)">Delete</button>
              </td>           
            </tr>
            @endfor
        @else
          <tr>
            <td>
              <div><input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Branch Name" name="branchName[]"></div>
            </td>
            <td>
              <div><input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Branch Address" name="branchAddress[]"></div>
            </td>
            <td>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Phone" name="phone[]">
            </td>
            <td>
              <select class="form-control" name="bank_id[]">
                <option> Select </option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}"> {{ $bank->bankName }}</option>
                @endforeach
            </select>
            </td>
            <td>
              <button type="button" style="margin-left:15px;" onclick="myDeleteFunction(this)">Delete</button>
            </td>
          </tr>
          @endif
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
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = '<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Branch Name" name="branchName[]">';
        cell2.innerHTML = '<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Branch Address" name="branchAddress[]">';
        cell3.innerHTML = '<input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Phone" name="phone[]">';
        cell4.innerHTML = `<select class="form-control" name="bank_id[]">
                <option> Select </option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}"> {{ $bank->bankName }}</option>
                @endforeach
            </select>`;
        cell5.innerHTML = '<button type="button" style="margin-left:15px;" onclick="myDeleteFunction(this)">Delete</button>';
        cell1.style.padding = "20px";
      }


      function myDeleteFunction(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
      }
    </script>
    
  </body>
</html>








