 <div class="panel" title="Add Employees">
        <div class="wrapper">
          <h1>Add Employee</h1>
          <p>Please enter employee details here</p>
          <?php

						//echo form_open($base_url,'employee/addEmployee');

						echo form_open();

						$firstname = array(
              'name'  => 'firstname',
              'id' => 'firstname',
              'value'   => set_value('firstname')
						);
							
						$lastname = array(
              'name'  => 'lastname',
              'id' => 'lastname',
              'value'   => set_value('lastname')
						);
							
						$address = array(
              'name'  => 'address',
              'id' => 'address',
              'value'   => set_value('address')
						);
							
						$age = array(
              'name'  => 'age',
              'id' => 'age',
              'value'   => set_value('age')
						);
							
						$designation = array(
              'name'  => 'designation',
              'id' => 'designation',
              'value'   => set_value('designation')
						);
							
						$department = array(
              'name'  => 'department',
              'id' => 'department',
              'value'   => set_value('department')
						);

						$insertbutton = array(
    		'name' => 'insertbutton',
    		'id' => 'insertbutton',
    		'value'=>'Add Info',
 	  		'content' => 'Add Info'
 	 					 );

 	    ?>
          <ul>
            <li>
              <label>Firstname:</label>
              <div>
                <?php echo form_input($firstname); ?>
              </div>
            </li>
            <li>
              <label>Lastname:</label>
              <div>
                <?php echo form_input($lastname); ?>
              </div>
            </li>
            <li>
              <label>Address:</label>
              <div>
                <?php echo form_input($address); ?>
              </div>
            </li>
            <li>
              <label>Age:</label>
              <div>
                <?php echo form_input($age); ?>
              </div>
            </li>
            <li>
              <label>Designation:</label>
              <div>
                <?php echo form_input($designation); ?>
              </div>
            </li>
            <li>
              <label>Department:</label>
              <div>
                <?php echo form_input($department); ?>
              </div>
            </li>
            <li>
              <div>
                <?php echo form_button($insertbutton); ?>
              </div>
            </li>
            <li>
              <div id="message"></div>
            </li>
          </ul>
          <?php
						echo form_close();
						?>
        </div>
      </div>