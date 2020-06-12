<?php
 require('fpdf.php');
  class reportePDF extends FPDF {

    function Header(){
        $this->Image('public/img/agro.png',243,8,30);
        $this->SetFont('Arial','B',15);
        $this->Cell(45);
        $this->SetTextColor(0,0,0);
        $this->Cell(160,20, $_SESSION['repor'] .' Ingenieria Agroindustrial',0,0,'C');
        $this->Ln(30);
          
          

    }

    function TablaPromedio($header, $resul){
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
        if($i==4){
            $aux =80;
        }
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
            $this->Cell(35,6,$value['codigoEstudiante'],1,0,'C',$fill);
            $this->Cell(35,6,$value['documento'],1,0,'C',$fill);
            $this->Cell(35,6,$value['nombres'],1,0,'C',$fill);
            $this->Cell(35,6,$value['apellidos'],1,0,'C',$fill);
            $this->Cell(80,6,$value['correoInstitucional'],1,0,'C',$fill);
            $this->Cell(35,6,$value['promedio'],1,0,'C',$fill);
            $this->Ln();
            
        }
        
      
    }


    function TablaNotas($header, $header11, $resultPro, $result11 ){
        //Colores, ancho de línea y fuente en negrita
        $this->Cell(60,20, "Notas Saber Pro",0,0,'C');
        $this->Ln(20);
        $this->SetFillColor(18, 67, 172);
        $this->SetTextColor(255);
        $this->SetDrawColor(1, 87, 138);
        $this->SetLineWidth(.3);
        $this->SetFont('Times','B', '11');

        $this->Cell(8);
        for($i=0;$i<count($header);$i++){
        $aux =47;
        if($i==5){
            $aux =30;
        }
        $this->Cell($aux,6,$header[$i],1,0,'C',1);
        
        }
        $this->Ln();


        
        //Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $cont=0;
        foreach ($resultPro as $key => $value) {
            if($cont%2==0){
                $fill=false;
            }else{
                $fill=true;
            }
            $cont++;
            $this->Cell(8);
            $this->Cell(47,6,$value['codigoEstudiante'],1,0,'C',$fill);
            $this->Cell(47,6,$value['lectura_critica'],1,0,'C',$fill);
            $this->Cell(47,6,$value['razonamiento_cuantitativo'],1,0,'C',$fill);
            $this->Cell(47,6,$value['competencias_ciudadana'],1,0,'C',$fill);
            $this->Cell(47,6,$value['comunicacion_escrita'],1,0,'C',$fill);
            $this->Cell(30,6,$value['ingles'],1,0,'C',$fill);
            $this->Ln();
            
        }

        $this->Ln(10);
        $this->SetFont('Arial','B',15);


        ///PARTE 2

         //Colores, ancho de línea y fuente en negrita
         $this->Cell(60,20, "Notas Saber 11",0,0,'C');
         $this->Ln(20);
         $this->SetFillColor(18, 67, 172);
         $this->SetTextColor(255);
         $this->SetDrawColor(1, 87, 138);
         $this->SetLineWidth(.3);
         $this->SetFont('Times','B', '11');
 
         $this->Cell(12);
         for($i=0;$i<count($header11);$i++){
         $aux =45;
         if($i==5){
             $aux =30;
         }
         $this->Cell($aux,6,$header11[$i],1,0,'C',1);
         
         }
         $this->Ln();
 
 
         
         //Restauración de colores y fuentes
         $this->SetFillColor(224,235,255);
         $this->SetTextColor(0);
         $this->SetFont('');
 
         $cont=0;
         foreach ($result11 as $key => $value) {
             if($cont%2==0){
                 $fill=false;
             }else{
                 $fill=true;
             }
             $cont++;
             $this->Cell(12);
             $this->Cell(45,6,$value['codigoEstudiante'],1,0,'C',$fill);
             $this->Cell(45,6,$value['lectura_critica'],1,0,'C',$fill);
             $this->Cell(45,6,$value['matematica'],1,0,'C',$fill);
             $this->Cell(45,6,$value['sociales_ciudadanas'],1,0,'C',$fill);
             $this->Cell(45,6,$value['naturales'],1,0,'C',$fill);
             $this->Cell(30,6,$value['ingles'],1,0,'C',$fill);
             $this->Ln();
             
         }
         
         $this->SetFont('Arial','B',14);
         
    }


    function agregarImagen(){

        $this->Cell(60,20, "Comparacion Grafica % ",0,0,'C');
        $this->Image('public/imgTemp/image.png', 50 ,80, 180 , 80);


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