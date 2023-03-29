<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Branch</title>
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

</head>
<body>
  @include('navbar')
    <h2>Edit Branch</h2>
    <form action="{{ route('branch.update',$branch->id)}}"  method="POST" enctype="multipart/form-data">
      
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="exampleInputEmail1"> Branch Name</label>
            <br>
            <input type="text" class="form-control" value="{{ $branch->branchName }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter update " name="branchName">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Branch Address</label>
            <br>
            <input type="text" class="form-control" value="{{ $branch->branchAddress }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter update " name="branchAddress">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Phone</label>
            <br>
            <input type="text" class="form-control" value="{{ $branch->phone }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter update " name="phone">
        </div>
        <br>
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

        <button type="submit" class="btn btn-primary"> Update </button>
    </form>
</body>
</html>