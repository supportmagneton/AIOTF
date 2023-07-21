<?php
error_reporting(0);
ob_start();

require 'pdf/vendor/autoload.php';

 $conn = mysqli_connect("localhost", "sduniquefindsonl_aiotg_user", "H)1coKKIhs^1", "sduniquefindsonl_aiotg");
 
 if($conn === false){echo "Failed";die;
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        
        $total1 =  $_POST['sum1'];
        $total2 =  $_POST['sum2'];
        $total3 =  $_POST['sum3']; 
        $total4=  $_POST['sum4'];
        $total5 =  $_POST['sum5'];
        
        $sql = "INSERT INTO cardiology (patient,total1,total2,total3,total4,total5) VALUES ('patient','$total1','$total2','$total3','$total4','$total5')";
       
        
        if($conn->query($sql) === TRUE){
            echo '<script type="text/javascript">'; 
		
		 echo 'window.location.href = "thank_you.php"';
		echo '</script>';
           
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
       
     ob_end_clean();   
         
     
    // Fetch the PDF data as an associative array
   
        $html.='<br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="imgs/aiotg_logo.jpg" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs/logonew.jpg" style="width:80px;height:80px;"><br>';
        $html.='<h1 style="text-align:center;">CARDIOLOGY</h1>';
       $html.='<table style="border:1px solid black;border-collapse: collapse;">';
       $html.='<tr><th style="border:1px solid black;border-collapse: collapse;">Patient</th>
       <th style="border:1px solid black;border-collapse: collapse;">Health Score</th></tr>';
        
            $html.='<tr><td style="border:1px solid black;border-collapse: collapse;">Patient1</td><td style="border:1px solid black;border-collapse: collapse;">' .$total1.'</td></tr>
            <tr><td style="border:1px solid black;border-collapse: collapse;">Patient2</td><td style="border:1px solid black;border-collapse: collapse;">'.$total2.'</td></tr>
            <tr><td style="border:1px solid black;border-collapse: collapse;">Patient3</td><td style="border:1px solid black;border-collapse: collapse;">'.$total3.'</td></tr>
            <tr><td style="border:1px solid black;border-collapse: collapse;">Patient4</td><td style="border:1px solid black;border-collapse: collapse;">'.$total4.'</td></tr>
           <tr><td style="border:1px solid black;border-collapse: collapse;">Patient5</td><td style="border:1px solid black;border-collapse: collapse;">'.$total5.'</td></tr>';
            
       
  
    $html.='</table>';
    
    

    // Close the database connection
     mysqli_close($conn);

    // Generate and serve the PDF to the user
    $pdf = new TCPDF();
    $pdf->SetTitle('My PDF');
    $pdf->AddPage();
    $pdf->writeHTML($html);
    $pdf->Output('Cardiology_pdf.pdf', 'D');
    
   

        
?>