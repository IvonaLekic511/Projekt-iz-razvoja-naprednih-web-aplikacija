<table>
              <thead>
                  <tr>
                      <th>
                          Ime
                      </th>
                      <th>
                          Prezime
                      </th>
                      <th>
                          Datum rođenja
                      </th>
                  </tr>
              </thead>
              <tbody>
                    <?php
                   require('db.php');
                    
                   $sql = "SELECT first_name, last_name, birth_date from employees.employees order by FID limit 10";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                           echo "<tr><td data-label=".'First Name'.">".$row["first_name"]."</td><td data-label=".'Last Name'.">".$row["last_name"]."</td><td data-label=".'Birth Date'.">".$row["birth_date"]."</td></tr>";
                       }
                   } else {
                       echo "0 results";
                   }
                   
                   $conn->close();
                    ?> 
              </tbody>
          </table>