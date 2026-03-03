<?php

namespace App\Controllers;

class ReportController extends BaseController {

    public function index() {
        $this->render('reports/index');
    }

    public function byGroup() {
        $sql = "SELECT a.*, g.name as group_name, l.name as location_name, r.name as responsible_name 
                FROM assets a 
                LEFT JOIN asset_groups g ON a.group_id = g.id 
                LEFT JOIN locations l ON a.location_id = l.id
                LEFT JOIN responsibles r ON a.responsible_id = r.id
                ORDER BY g.name, a.patrimony_code";
        $assets = $this->db->query($sql)->fetchAll();
        
        $this->render('reports/list', [
            'title' => 'Relatório por Grupo de Bens',
            'group_field' => 'group_name',
            'assets' => $assets
        ]);
    }

    public function byLocation() {
        $sql = "SELECT a.*, g.name as group_name, l.name as location_name, r.name as responsible_name 
                FROM assets a 
                LEFT JOIN asset_groups g ON a.group_id = g.id 
                LEFT JOIN locations l ON a.location_id = l.id
                LEFT JOIN responsibles r ON a.responsible_id = r.id
                ORDER BY l.name, a.patrimony_code";
        $assets = $this->db->query($sql)->fetchAll();
        
        $this->render('reports/list', [
            'title' => 'Relatório por Local',
            'group_field' => 'location_name',
            'assets' => $assets
        ]);
    }

    public function byResponsible() {
        $sql = "SELECT a.*, g.name as group_name, l.name as location_name, r.name as responsible_name 
                FROM assets a 
                LEFT JOIN asset_groups g ON a.group_id = g.id 
                LEFT JOIN locations l ON a.location_id = l.id
                LEFT JOIN responsibles r ON a.responsible_id = r.id
                ORDER BY r.name, a.patrimony_code";
        $assets = $this->db->query($sql)->fetchAll();
        
        $this->render('reports/list', [
            'title' => 'Relatório por Responsável',
            'group_field' => 'responsible_name',
            'assets' => $assets
        ]);
    }
}
