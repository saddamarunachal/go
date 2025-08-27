<?php
class DashboardController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getKpis() {
        $clientCount = $this->db->query('SELECT COUNT(*) FROM clients')->fetchColumn();
        $leadCount = $this->db->query('SELECT COUNT(*) FROM leads')->fetchColumn();
        $dealCount = $this->db->query('SELECT COUNT(*) FROM deals')->fetchColumn();
        $activityCount = $this->db->query('SELECT COUNT(*) FROM activities')->fetchColumn();
        return [
            'clients' => $clientCount,
            'leads' => $leadCount,
            'deals' => $dealCount,
            'activities' => $activityCount
        ];
    }
}
?>
