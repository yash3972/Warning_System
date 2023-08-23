

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Info Button Example</title>
<style>
  /* Style for the info button */
  .info-button {
    cursor: pointer;
    color: blue;
    text-decoration: underline;
  }

  /* Style for the hidden div containing the table */
  .table-container {
    display: none;
    margin-top: 10px;
    /* border: 1px solid #ccc; */
    padding: 10px;
    display: block;
  }

  /* Style for the table */
  table {
    width: 50%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }
</style>
</head>
<body>
  <button class="info-button" onclick="toggleTable()">Show Info</button>
  <div class="table-container" id="tableContainer">
    <table id="infoTable">
      <!-- Table content will be inserted here -->
    </table>
  </div>
  <script>
    function toggleTable() {
      var tableContainer = document.getElementById("tableContainer");
      tableContainer.style.display = tableContainer.style.display === "none" ? "block" : "none";

      if (tableContainer.style.display === "block") {
        // Fetch and populate the table
        fetchTableData();
      }
    }

    function fetchTableData() {
      var table = document.getElementById("infoTable");
      
      // Fetch and insert data from the PHP-generated table
      fetch('messagetable.php')  // Replace with the correct path to your PHP script
        .then(response => response.text())
        .then(data => {
          table.innerHTML = data;
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  </script>
</body>
</html>
