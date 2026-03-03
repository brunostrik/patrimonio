<?php

namespace App\Controllers;

class HomeController extends BaseController {

    public function index() {
        // Get counts for dashboard
        $stats = [
            'assets_count' => $this->db->query("SELECT COUNT(*) FROM assets")->fetchColumn(),
            'groups_count' => $this->db->query("SELECT COUNT(*) FROM asset_groups")->fetchColumn(),
            'locations_count' => $this->db->query("SELECT COUNT(*) FROM locations")->fetchColumn(),
            'responsibles_count' => $this->db->query("SELECT COUNT(*) FROM responsibles")->fetchColumn(),
        ];

        $this->render('home', ['stats' => $stats]);
    }
}
