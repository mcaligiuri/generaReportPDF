<?php
include "fpdf/fpdf.php";
class CMyPdf extends FPDF
{
    function SetIntestazione()
    {
        $this->Image('image/logo.png', 75, 5);
        $this->SetFont('Arial','B', 14);
        $this->Ln();
        $this->Cell(276, 5, "EXPORT NOTE SERIES",0,0,'C');
        $this->Ln();
        $this->SetFont('Times','', 12);
        $this->Cell(276, 5, "Created By MC Software",0,0,'C');
        $this->Ln(15);
    }
    function SetColonne($n)
    {
        include "lang.php";
        $this->SetFont('Arial','B','12');
        if ($n == 1) //viste
        {
            for ($i = 0; $i < count($widthV); $i++)
                $this->Cell($widthV[$i],10,utf8_decode($colsV[$i]),1,0,'C');
        }
        else // future
        {
            for ($i = 0; $i < count($widthF); $i++)
                $this->Cell($widthF[$i],10,utf8_decode($colsF[$i]),1,0,'C');
        }
        $this->Ln();
    }
    // Se l'utente esporta dalla sezione "viste"
    function SetRigheV($nome,$dir,$iniz,$fine,$stat,$sito,$voto,$com)
    {
        $this->SetFont('Arial','', 9);
        $c1 = explode("*--*",utf8_decode($nome));
        $c2 = explode("*--*",utf8_decode($dir));
        $c3 = explode("*--*",utf8_decode($iniz));
        $c4 = explode("*--*",utf8_decode($fine));
        $c5 = explode("*--*",utf8_decode($stat));
        $c7 = explode("*--*",utf8_decode($sito));
        $c8 = explode("*--*",$voto);
        $c9 = explode("*--*",utf8_decode($com));
        for($i = 0; $i < count($c1) - 1; $i++)
        {
            $this->SetMyCell(60,10,$this->GetX(),$c1[$i]);
            $this->SetMyCell(60,10,$this->GetX(),$c2[$i]);
            $this->SetMyCell(20,10,$this->GetX(),$c3[$i]);
            $this->SetMyCell(20,10,$this->GetX(),$c4[$i]);
            $this->SetMyCell(15,10,$this->GetX(),$c5[$i]);
            $this->SetMyCell(60,10,$this->GetX(),$c7[$i]);
            $this->SetMyCell(10,10,$this->GetX(),$c8[$i]);
            $this->SetMyCell(40,10,$this->GetX(),$c9[$i]);
            $this->Ln();
        }
    }
    // Se l'utente esporta dalla sezione "future"
    function SetRigheF($nome,$stat,$prio,$com)
    {
        $this->SetFont('Arial','', 9);
        $c1 = explode("*--*",utf8_decode($nome));
        $c5 = explode("*--*",utf8_decode($stat));
        $c6 = explode("*--*",utf8_decode($prio));
        $c9 = explode("*--*",utf8_decode($com));
        for($i = 0; $i < count($c1) -1; $i++)
        {
            $this->SetMyCell(60,10,$this->GetX(),utf8_decode($c1[$i]));
            $this->SetMyCell(20,10,$this->GetX(),$c5[$i]);
            $this->SetMyCell(20,10,$this->GetX(),$c6[$i]);
            $this->SetMyCell(80,10,$this->GetX(),$c9[$i]);
            $this->Ln();
        }
    }
    // Metodo per gestire gli "a capo" nelle celle
    function SetMyCell($w,$h,$x,$riga)
    {
        $height = $h / 3;
        $riga1 = $height + 2;
        $riga2 = ($height*3)+3;
        $lung = strlen($riga);

        if( $lung > 36 )
        {
            $righe = str_split($riga,36);
            $this->SetX($x);
            $this->Cell($w,$riga1,$righe[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$riga2,$righe[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$h,'',1,0,'L');
        }
        else 
        {
            $this->SetX($x);
            $this->Cell($w,$h,$riga,1,0,'L');
        }
    }
    // Ridefinisco metodo per visualizzare il numero di pagina
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',9);
        $this->Cell(0,10,'P '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>