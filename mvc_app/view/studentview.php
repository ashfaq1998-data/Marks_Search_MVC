<html>
    <head> 
        <title>Get Marks of students</title> 

        <style> 
input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>
    </head> 
    <body> 

<script>


function doSearch () {

  var data = new FormData();
  data.append("search", document.getElementById("search").value);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../controller/studentcontroller.php");
  xhr.onload = function(){
    let results = document.getElementById("results"),
    search = JSON.parse(this.response);
    //results.innerHTML = "";
    if (search !== null) { for (let x of search) {
      results.innerHTML += `<div> ${x.FirstName} ${x.LasttName} belongs to StudentID ${x.StudentID} have obtained ${x.Marks} marks </div>`;
    }}
  };
  xhr.send(data);
  return false;
}



</script>

<h1 style="text-align:center">Enter your name to see the Marks</h1>
<form onsubmit="return doSearch()">
  <input type="text" id="search" required/>
  <input type="submit" />
</form>
 
<h3>The Final Output </h3>
<div id="results"></div>
    </body> 
</html>