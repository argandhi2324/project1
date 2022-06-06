<div class=head>
<h1>Update Student details</h1>
</div>
<br>
<div class=form>
<form action="{{route('students.update',$s1->id)}}" method="POST">
@csrf
@METHOD('PUT')
<label><h4>Name</h4></label>
<input type="text" name=name value={{$s1->name}}><br>
<label><h4>Email id</h4></label>
<input type="text" name=email value={{$s1->email}}><br>
<label><h4>Phone no</h4></label>
<input type="text" name=number value={{$s1->number}}><br>
<br><br>
<button type=submit>Update</button>
</form>
</div>


<style>
    .head h1{
        margin-left:20px;
        margin-top:20px;
    }
    .form{
        margin-left:20px;
    }
</style>