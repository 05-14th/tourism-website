<!DOCTYPE html>
<html>
<head>
  <title>Enable/Disable File Input</title>
  <script>
    function toggleFileInput() {
      var checkbox = document.getElementById('enableCheckbox');
      var fileInput = document.getElementById('fileToUpload');
      
      // Check if the checkbox is checked
      if (checkbox.checked) {
        fileInput.disabled = false; // Enable file input
      } else {
        fileInput.disabled = true; // Disable file input
      }
    }
  </script>
</head>
<body>
  <h2>Enable/Disable File Input</h2>
  
  <label for="enableCheckbox">Enable File Input:</label>
  <input type="checkbox" id="enableCheckbox" onchange="toggleFileInput()">
  
  <br><br>
  
  <input type="file" name="fileToUpload" id="fileToUpload" disabled>
</body>
</html>
