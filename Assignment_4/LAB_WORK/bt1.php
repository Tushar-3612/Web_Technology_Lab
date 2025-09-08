<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form>
       Enter The Name <input type="text" id="name">
       Enter The mark <input type="number" id="mark">

       <button type="submit" id="submit">Submit</button>

 
   </form>

   <script>
       async function senddata(e){
         e.preventDefault();

           let x = document.getElementById("name").value;
           let y = document.getElementById("mark").value;

           let formdata1 = new FormData();
           formdata1.append("sname", x);
           formdata1.append("smarks", y);

           let response = await fetch("http://localhost/Testing 1st/getdata2.php", {
               method: "POST",
               body: formdata1
           });

           let result = await response.text();
           console.log(result);  
       }
         
        document.getElementById("submit").addEventListener("click", senddata);


        //delete oprn 
        async function deletedata(){
            
        }
        document.getElementById("deletebtn").addEventListener("click", senddata);
   </script>
</body>
</html>


   