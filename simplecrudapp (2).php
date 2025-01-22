<!DOCTYPE html>
<html>
<head>
    <title>Simple CRUD App </title>
    <style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url("florr.jpg");
     background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;
    background-color: #f0e6ef; 
}

.t {
    text-align: center;
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 5px solid #d8bfd8; 
}

h1 {
    margin-bottom: 20px;
    color: #800080; 
}

.centert {
    margin-bottom: 20px;
}

input[type="text"] {
    padding: 10px;
    width: 70%;
    margin-right: 10px;
    border: 1px solid #d8bfd8; 
    border-radius: 4px;
}

button {
    margin-top: 5px;
    padding: 15px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #ff69b4; 
    color: #fff;
}

.delete-btn {
    background-color: #800080; 
    color: #fff;
}

table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #d8bfd8; 
    border-radius: 8px; 
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #d8bfd8; 
}

th {
    background-color: #e6e6fa; 
    font-weight: bold;
}
    </style>
</head>
<link rel="stylesheet" href="crud.css">
<body>
    <div class="t">
<div class="center">
  <p> <h1 >Simple CRUD App</h1></p>
</div>  

<div class="centert">
<input type="text" id="itemInput" placeholder="Enter An Item" />
<button class="create-btn" onclick="createItem()">Add Item</button>
</div>

<table>
   <thead>
       <tr>        
           <th>Item</th>
           <th>Actions</th>
       </tr>
   </thead>
   <tbody id="itemTable"></tbody>
</table>       
</div>

<script>
   let items = [];
   let updateIndex = null;
   function renderTable(){
        const table = document.getElementById("itemTable");
        table.innerHTML = "";

        items.forEach((item, index) => {
           table.innerHTML += `
                 <tr>
                   <td>${item}</td>
                   <td>
                       <button class="update-btn" onclick="editItem(${index})">Edit</button>
                       <button class="delete-btn" onclick="deleteItem(${index})">Delete</button>
                    </td>   
                  </tr>
           
           `;       
       
       });

}

  function editItem(index) {
     const input = document.getElementById("itemInput");
     input.value = items [index];
     updateIndex = index;
     document.querySelector(".create-btn").textContent = "Update Item";
}


  function deleteItem(index) {
     if (confirm("Are  you sure you want to delete this item?")) {
       items.splice(index, 1);
       renderTable();
     }
                                                                                              

  }

   function createItem() {
      const input = document.getElementById("itemInput");
      const value = input.value.trim();
      if (!value)  {
       alert("Please enter an item!");
       return;
   }
   if (updateIndex === null){

       items.push(value);
   }else {
      
       items[updateIndex]= value;
       updateIndex = null;
       document.querySelector(" .create-btn").textContent = "Add Item";


   }
   input.value = "";
   renderTable();

}

   renderTable();
   </script>
</html>
</body>