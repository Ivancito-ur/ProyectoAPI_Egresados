<?php
 require('fpdf.php');
  class reporteEmpresa extends FPDF {

    function Header(){
        $this->Image('public/img/agro.png',243,8,30);
        $this->SetFont('Arial','B',15);
        $this->Cell(45);
        $this->SetTextColor(0,0,0);
        $this->Cell(160,20, 'Empresas en convenio con Ingenieria Agroindustrial',0,0,'C');
        $this->Ln(32);
          
          

    }

    function TablaConvenio($header, $resul){
        //Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(18, 67, 172);
        $this->SetTextColor(255);
        $this->SetDrawColor(1, 87, 138);
        $this->SetLineWidth(.3);
        $this->SetFont('Times','B', '10');
        

        //cabecera
        $this->Cell(10);
        for($i=0;$i<count($header);$i++){
        $aux =35;
        $this->Cell($aux,6,$header[$i],1,0,'C',1);
        }


        $this->Ln();
        //Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $cont=0;
        foreach ($resul as $key => $value) {
           
            if($cont%2==0){
                $fill=false;
            }else{
                $fill=true;
            }
            $cont++;
            
            $this->Cell(10);
            $this->Cell(35,6,$value['nombre'],1,0,'C',$fill);
            $this->Cell(35,6,$value['correo'],1,0,'C',$fill);
            $this->Cell(35,6,$value['telefono'],1,0,'C',$fill);
            $this->Cell(35,6,$value['celular'],1,0,'C',$fill);
            $this->Cell(35,6,$value['direccion'],1,0,'C',$fill);
            $this->Cell(35,6,$value['ciudad'],1,0,'C',$fill);
            $this->Cell(35,6,$value['fecha_registro'],1,0,'C',$fill);
            $this->Ln();
            
        }
        
      
    }


    function Footer(){
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',9);
    // Print centered page number
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
   }

}


?>