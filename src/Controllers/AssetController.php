<?php

namespace App\Controllers;

class AssetController extends BaseController {

    public function index() {
        $sql = "SELECT a.*, 
                       g.name as group_name, 
                       l.name as location_name, 
                       r.name as responsible_name 
                FROM assets a
                LEFT JOIN asset_groups g ON a.group_id = g.id
                LEFT JOIN locations l ON a.location_id = l.id
                LEFT JOIN responsibles r ON a.responsible_id = r.id
                ORDER BY a.patrimony_code";
        
        $assets = $this->db->query($sql)->fetchAll();
        $this->render('assets/index', ['assets' => $assets]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'patrimony_code' => $_POST['patrimony_code'],
                'rfid_code' => $_POST['rfid_code'] ?: null,
                'description' => $_POST['description'],
                'group_id' => $_POST['group_id'] ?: null,
                'location_id' => $_POST['location_id'] ?: null,
                'responsible_id' => $_POST['responsible_id'] ?: null,
                'acquisition_date' => $_POST['acquisition_date'] ?: null,
                'value' => $_POST['value'] ?: null,
                'status' => $_POST['status']
            ];

            $sql = "INSERT INTO assets (patrimony_code, rfid_code, description, group_id, location_id, responsible_id, acquisition_date, value, status) 
                    VALUES (:patrimony_code, :rfid_code, :description, :group_id, :location_id, :responsible_id, :acquisition_date, :value, :status)";
            
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($data);
                $this->setFlash('Bem cadastrado com sucesso!');
                $this->redirect('/assets');
            } catch (\PDOException $e) {
                $this->setFlash('Erro ao cadastrar bem: ' . $e->getMessage(), 'danger');
            }
        }

        $this->renderForm('create');
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'patrimony_code' => $_POST['patrimony_code'],
                'rfid_code' => $_POST['rfid_code'] ?: null,
                'description' => $_POST['description'],
                'group_id' => $_POST['group_id'] ?: null,
                'location_id' => $_POST['location_id'] ?: null,
                'responsible_id' => $_POST['responsible_id'] ?: null,
                'acquisition_date' => $_POST['acquisition_date'] ?: null,
                'value' => $_POST['value'] ?: null,
                'status' => $_POST['status'],
                'id' => $id
            ];

            $sql = "UPDATE assets SET 
                    patrimony_code = :patrimony_code,
                    rfid_code = :rfid_code,
                    description = :description,
                    group_id = :group_id,
                    location_id = :location_id,
                    responsible_id = :responsible_id,
                    acquisition_date = :acquisition_date,
                    value = :value,
                    status = :status
                    WHERE id = :id";
            
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($data);
                $this->setFlash('Bem atualizado com sucesso!');
                $this->redirect('/assets');
            } catch (\PDOException $e) {
                $this->setFlash('Erro ao atualizar bem: ' . $e->getMessage(), 'danger');
            }
        }

        $stmt = $this->db->prepare("SELECT * FROM assets WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $asset = $stmt->fetch();

        if (!$asset) {
            $this->setFlash('Bem não encontrado.', 'danger');
            $this->redirect('/assets');
        }

        $this->renderForm('edit', $asset);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM assets WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $this->setFlash('Bem excluído com sucesso!');
        $this->redirect('/assets');
    }

    private function renderForm($action, $asset = null) {
        $groups = $this->db->query("SELECT * FROM asset_groups ORDER BY name")->fetchAll();
        $locations = $this->db->query("SELECT * FROM locations ORDER BY name")->fetchAll();
        $responsibles = $this->db->query("SELECT * FROM responsibles ORDER BY name")->fetchAll();

        $this->render('assets/form', [
            'action' => $action,
            'asset' => $asset,
            'groups' => $groups,
            'locations' => $locations,
            'responsibles' => $responsibles
        ]);
    }
}
