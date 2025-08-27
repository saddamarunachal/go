<?php
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Lead.php';
require_once __DIR__ . '/../libs/fpdf.php';

class ReportController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function clientsCsv() {
        $clients = (new Client($this->db))->all();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=clients.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID','Name','Email','Phone','Company']);
        foreach ($clients as $c) {
            fputcsv($out, [$c['id'],$c['name'],$c['email'],$c['phone'],$c['company']]);
        }
        fclose($out);
    }

    public function clientsPdf() {
        $clients = (new Client($this->db))->all();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(40,10,'Clients');
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        foreach ($clients as $c) {
            $pdf->Cell(0,10,$c['name'].' - '.$c['email'],0,1);
        }
        $pdf->Output('D','clients.pdf');
    }

    public function leadsCsv() {
        $leads = (new Lead($this->db))->all();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=leads.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID','Client','Status','Source']);
        foreach ($leads as $l) {
            fputcsv($out, [$l['id'],$l['client_id'],$l['status'],$l['source']]);
        }
        fclose($out);
    }

    public function leadsPdf() {
        $leads = (new Lead($this->db))->all();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(40,10,'Leads');
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        foreach ($leads as $l) {
            $pdf->Cell(0,10,'Client '.$l['client_id'].' - '.$l['status'],0,1);
        }
        $pdf->Output('D','leads.pdf');
    }
}
?>
