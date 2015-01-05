<?php

$config = array(
               array(
                     'field'   => 'firstname',
                     'label'   => 'Firstname',
                     'rules'   => 'trim|required|alpha_numeric|xss_clean'
                  ),
               array(
                     'field'   => 'lastname',
                     'label'   => 'LastName',
                     'rules'   => 'trim|required|alpha_numeric|xss_clean'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Address',
                     'rules'   => 'trim|required|alpha_numeric|xss_clean'
                  ),  
			   array(
                     'field'   => 'age',
                     'label'   => 'Age',
                     'rules'   => 'trim|required|alpha_numeric|xss_clean'
                    ),  
                array(
                     'field'   => 'designation',
                     'label'   => 'Designation',
                     'rules'   => 'trim|required|xss_clean'
                  ), 
                array(
                     'field'   => 'department',
                     'label'   => 'Department',
                     'rules'   => 'trim|required|alpha_numeric|xss_clean'
                  )
            );









?>