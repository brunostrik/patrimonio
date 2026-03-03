<?php

namespace App\Controllers;

class MovementController extends BaseController {

    public function index() {
        $sql = "SELECT m.*, 
                       a.patrimony_code, a.description as asset_name,
                       l_from.name as from_location, l_to.name as to_location,
                       r_from.name as from_responsible, r_to.name as to_responsible,
                       u.name as user_name
                FROM movements m
                JOIN assets a ON m.asset_id = a.id
                LEFT JOIN locations l_from ON m.from_location_id = l_from.id
                LEFT JOIN locations l_to ON m.to_location_id = l_to.id
                LEFT JOIN responsibles r_from ON m.from_responsible_id = r_from.id
                LEFT JOIN responsibles r_to ON m.to_responsible_id = r_to.id
                LEFT JOIN users u ON m.user_id = u.id
                ORDER BY m.movement_date DESC";
        
        $movements = $this->db->query($sql)->fetchAll();
        $this->render('movements/index', ['movements' => $movements]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $asset_id = $_POST['asset_id'];
            $to_location_id = $_POST['to_location_id'] ?: null;
            $to_responsible_id = $_POST['to_responsible_id'] ?: null;
            $reason = $_POST['reason'];

            try {
                $this->db->beginTransaction();

                // Get current asset state
                $stmt = $this->db->prepare("SELECT * FROM assets WHERE id = :id");
                $stmt->execute(['id' => $asset_id]);
                $asset = $stmt->fetch();

                if (!$asset) {
                    throw new \Exception("Bem não encontrado.");
                }

                // Determine new values (keep old if not provided)
                $new_location_id = !empty($to_location_id) ? $to_location_id : $asset['location_id'];
                $new_responsible_id = !empty($to_responsible_id) ? $to_responsible_id : $asset['responsible_id'];

                // Insert movement
                $sql = "INSERT INTO movements (asset_id, from_location_id, to_location_id, from_responsible_id, to_responsible_id, user_id, reason) 
                        VALUES (:asset_id, :from_loc, :to_loc, :from_resp, :to_resp, :user_id, :reason)";
                
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    'asset_id' => $asset_id,
                    'from_loc' => $asset['location_id'],
                    'to_loc' => $new_location_id,
                    'from_resp' => $asset['responsible_id'],
                    'to_resp' => $new_responsible_id,
                    'user_id' => $_SESSION['user_id'],
                    'reason' => $reason
                ]);

                // Update asset
                $sql = "UPDATE assets SET location_id = :loc, responsible_id = :resp WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    'loc' => $new_location_id,
                    'resp' => $new_responsible_id,
                    'id' => $asset_id
                ]);

                $this->db->commit();
                $this->setFlash('Movimentação realizada com sucesso!');
                $this->redirect('/movements');

            } catch (\Exception $e) {
                $this->db->rollBack();
                $this->setFlash('Erro ao realizar movimentação: ' . $e->getMessage(), 'danger');
            }
        }

        $assets = $this->db->query("SELECT id, patrimony_code, description FROM assets ORDER BY patrimony_code")->fetchAll();
        $locations = $this->db->query("SELECT * FROM locations ORDER BY name")->fetchAll();
        $responsibles = $this->db->query("SELECT * FROM responsibles ORDER BY name")->fetchAll();

        $this->render('movements/form', [
            'assets' => $assets,
            'locations' => $locations,
            'responsibles' => $responsibles
        ]);
    }
}
