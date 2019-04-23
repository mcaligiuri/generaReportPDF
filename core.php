<?php
if(!empty($_POST['file']))
{
    $nome = $_POST['file'];
    unlink($nome);
    return;
}

switch ($n) 
{
    case 1:
    if(isset($_POST['nome']) && isset($_POST['cartella']) && isset($_POST['inizio']) && isset($_POST['fine']) 
    && isset($_POST['stato']) && isset($_POST['sito']) && isset($_POST['voto'])&& isset($_POST['commento']))
    {
        $nome = $_POST['nome'];
        $dir = $_POST['cartella'];
        $iniz = $_POST['inizio'];
        $fine = $_POST['fine'];
        $stat = $_POST['stato'];
        $sito = $_POST['sito'];
        $voto = $_POST['voto'];
        $com = $_POST['commento'];
        $pdf->SetRigheV($nome,$dir,$iniz,$fine,$stat,$sito,$voto,$com);
    }
    break;
    
    case 2:
    if(isset($_POST['nome']) &&  isset($_POST['stato']) && isset($_POST['priorita']) && isset($_POST['commento']))
    {
        $nome = $_POST['nome'];
        $stat = $_POST['stato'];
        $prio = $_POST['priorita'];
        $com = $_POST['commento'];
        $pdf->SetRigheF($nome,$stat,$prio,$com);
    }
    break;
}
?>