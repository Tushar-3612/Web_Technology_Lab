<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Data Fetched Application</title>
  <link rel="stylesheet" href="style.css"/>
  <style>
    #message {
      margin: 10px 0;
      padding: 10px;
      font-weight: bold;
      border-radius: 5px;
      display: none;
    }
    .success {
      background: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .error {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    #insert-section, #update-section {
      margin-top: 15px;
    }
    #update-section { display: none; }
  </style>
</head>
<body>
  <h1>Basic Data Fetched Application</h1>

  <!-- Message Area -->
  <div id="message"></div>

  <!-- Action Buttons -->
  
<form>
  <!-- Insert Section (default visible) -->
  <div id="insert-section">
    <h3>Insert Data</h3>
    Enter The Name <input type="text" id="name"><br><br>
    Enter The Mark <input type="number" id="mark"><br><br>
    <button type="button" id="confirmInsert">Confirm Insert</button><br><br>
  </div>

  <!-- Update Section (default hidden) -->
  <div id="update-section">
    <h3>Update Data</h3>
    Enter Old Name <input type="text" id="oldname"><br><br>
    Enter New Name <input type="text" id="newname"><br><br>
    <button type="button" id="confirmUpdate">Confirm Update</button><br><br>
  </div>
  <div>
    <button type="button" id="insertbtn">Insert</button>
    <button type="button" id="deletebtn">Delete</button>
    <button type="button" id="updatebtn">Update Name</button>
    <button type="button" id="displaybtn">Display All</button>
  </div>
</form>

  <!-- Display Table -->
  <div id="display-section" style="margin-top:20px; display:none;">
    <h3>All Records</h3>
    <table border="1" cellpadding="5" cellspacing="0" id="datatable">
      <thead>
        <tr><th>Name</th><th>Marks</th></tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

  <script>
    // Toggle Insert / Update sections
    document.getElementById("insertbtn").addEventListener("click", function () {
      document.getElementById("insert-section").style.display = "block";
      document.getElementById("update-section").style.display = "none";
    });

    document.getElementById("updatebtn").addEventListener("click", function () {
      document.getElementById("insert-section").style.display = "none";
      document.getElementById("update-section").style.display = "block";
    });

    // Helper function for message
    function showMessage(text, type="success") {
      let msg = document.getElementById("message");
      msg.innerText = text;
      msg.className = type;
      msg.style.display = "block";
      setTimeout(() => { msg.style.display = "none"; }, 3000);
    }

    // Insert Function
    document.getElementById("confirmInsert").addEventListener("click", async function () {
      let x = document.getElementById("name").value;
      let y = document.getElementById("mark").value;
      if (!x || !y) { showMessage("Enter name and marks!", "error"); return; }

      let formdata = new FormData();
      formdata.append("sname", x);
      formdata.append("smarks", y);

      let response = await fetch("http://localhost/Testing 1st/getdata2.php", {
        method: "POST",
        body: formdata
      });
      let result = await response.text();
      showMessage("Data Inserted Successfully!");
    });

    // Update Function
    document.getElementById("confirmUpdate").addEventListener("click", async function () {
      let oldn = document.getElementById("oldname").value;
      let newn = document.getElementById("newname").value;
      if (!oldn || !newn) { showMessage("Enter old and new name!", "error"); return; }

      let formdata = new FormData();
      formdata.append("old_name", oldn);
      formdata.append("new_name", newn);

      let response = await fetch("http://localhost/Testing 1st/getdata2.php", {
        method: "POST",
        body: formdata
      });
      let result = await response.text();
      showMessage("Name Updated Successfully!");
    });

    // Delete Function
    document.getElementById("deletebtn").addEventListener("click", async function () {
      let x = document.getElementById("name").value;
      if (!x) { showMessage("Enter a name to delete!", "error"); return; }

      let formdata = new FormData();
      formdata.append("delete_name", x);

      let response = await fetch("http://localhost/Testing 1st/getdata2.php", {
        method: "POST",
        body: formdata
      });
      let result = await response.text();
      showMessage("Data Deleted Successfully!");
    });

    // Display Function
    document.getElementById("displaybtn").addEventListener("click", async function () {
      let response = await fetch("http://localhost/Testing 1st/getdata2.php?fetch_all=1");
      let data = await response.json();

      let tbody = document.querySelector("#datatable tbody");
      tbody.innerHTML = "";
      data.forEach(row => {
        let tr = document.createElement("tr");
        tr.innerHTML = `<td>${row.Name}</td><td>${row.Mark}</td>`;
        tbody.appendChild(tr);
      });

      document.getElementById("display-section").style.display = "block";
      showMessage("Data Fetched Successfully!");
    });
  </script>
</body>
</html>
